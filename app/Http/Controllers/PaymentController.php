<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transactions;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{


	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	public function index()
{
    try {
        // Get current user
        $user = auth()->user();
        $userLevel = $user->level_id;

        // Get current date
        $today = now()->format('Y-m-d');

        // Get available active payments for the user's level
        $availablePayments = \App\Models\Payment::with('levels')
            ->where('status', 'active')
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->whereHas('levels', function($query) use ($userLevel) {
                $query->where('levels.id', $userLevel);
            })
            ->get();

        // Get user's payment history
        $paymentHistory = \App\Models\Transactions::with('payment')
        ->where('user_id', $user->id)
            ->whereNotNull('purpose_name')
              ->Where('purpose_name', 'custom')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.payment.index', [
            'availablePayments' => $availablePayments,
            'paymentHistory' => $paymentHistory,
            'pageTitle' => 'Make Payment',
            'show_header' => true,
            'layout' => 'layouts.app'
        ]);
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Payment index page error: ' . $e->getMessage());

        // Return view with error message
        return view('pages.payment.index', [
            'availablePayments' => [],
            'paymentHistory' => [],
            'pageTitle' => 'Make Payment',
            'show_header' => true,
            'layout' => 'layouts.app',
            'error' => 'An error occurred while loading payment options. Please try again later.'
        ]);
    }
}
    function admin_new(){

		$view = "pages.admin_payment.admin";

		return $this->renderView($view);
	}



 public function processPayment(Request $request)
{

    try {
        $request->validate([
            'payment_id' => 'required|exists:payments,id'
        ]);

        // Get the payment details
        $payment = Payment::findOrFail($request->payment_id);

        // Get authenticated user
        $user = auth()->user();
        if (!$user) {
            \Log::error('Payment process failed: User not authenticated');
            return redirect()->back()->with('error', 'Authentication required. Please log in to continue.');
        }

        // Set up callback URL
        $callbackUrl = URL::to('/payment_callback');
        \Log::info('Payment process initiated', [
            'user_id' => $user->id,
            'payment_id' => $payment->id,
            'amount' => $payment->amount,
            'callback_url' => $callbackUrl
        ]);

        // Use the makePayment helper function to initiate payment
        try {
            $response = makePayment($payment->amount, $user->email, $callbackUrl);
            \Log::info('Payment gateway response', ['response' => $response]);
        } catch (\Exception $e) {
            \Log::error('Payment gateway error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Payment gateway error: ' . $e->getMessage());
        }

        if (isset($response['status']) && $response['status'] === true) {
            // Create transaction record
            try {
                $transaction = Transactions::create([
                    'user_id' => $user->id,
                    'price_settings_id' => $payment->id, // Using payment_id as price_settings_id
                    'email' => $user->email,
                    'amount' => $payment->amount,
                    'fullname' => $user->lastname . " " . $user->firstname,
                    'phone_number' => $user->phone,
                    'callback_url' => $callbackUrl,
                    'reference' => $response['orderReference'],
                    'authorization_url' => $response['checkoutLink'],
                    'status' => 'Pending',
                    'purpose_name' =>'custom',
                ]);

                \Log::info('Transaction record created', ['transaction_id' => $transaction->id]);

                // Redirect to payment gateway
                return redirect()->away($response['checkoutLink']);
            } catch (\Exception $e) {
                \Log::error('Transaction creation failed', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'user_id' => $user->id,
                    'payment_id' => $payment->id
                ]);
                return redirect()->back()->with('error', 'Failed to create transaction record: ' . $e->getMessage());
            }
        } else {
            // Log the failed payment initialization
            \Log::warning('Payment initialization failed', [
                'response' => $response,
                'user_id' => $user->id,
                'payment_id' => $payment->id
            ]);

            // Handle payment initialization error
            return redirect()->back()->with('error', 'Unable to initialize payment. Please try again later.');
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::warning('Payment validation failed', [
            'errors' => $e->errors(),
            'request' => $request->all()
        ]);
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        \Log::error('Payment not found', [
            'payment_id' => $request->payment_id,
            'message' => $e->getMessage()
        ]);
        return redirect()->back()->with('error', 'The selected payment option is no longer available.');
    } catch (\Exception $e) {
        \Log::error('Unexpected error in payment process', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'request' => $request->all()
        ]);
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}


public function downloadReceipt($id)
{
    try {
        // Get the transaction
        $transaction = Transactions::findOrFail($id);

        // Check if user owns this transaction
        if (auth()->user()->id != $transaction->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to download this receipt.');
        }

        // Check if transaction is successful
        if ($transaction->status != 'Success') {
            return redirect()->back()->with('error', 'Receipt is only available for successful payments.');
        }

        // Get user details
        $user = \App\Models\Users::findOrFail($transaction->user_id);

        // Get payment details if available
        $paymentName = $transaction->purpose_name ?? 'Payment';

        // Generate PDF receipt
        $pdf = \PDF::loadView('pages.receipts.payment_receipt', [
            'transaction' => $transaction,
            'user' => $user,
            'paymentName' => $paymentName
        ]);

        // Generate a filename
        $filename = 'receipt_' . $transaction->reference . '.pdf';

        // Return the PDF for download
        return $pdf->download($filename);
    } catch (\Exception $e) {
        \Log::error('Receipt download failed', [
            'transaction_id' => $id,
            'error' => $e->getMessage()
        ]);

        return redirect()->back()->with('error', 'Failed to generate receipt. Please try again later.');
    }
}




}
