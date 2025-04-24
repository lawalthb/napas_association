<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Levels;
use Illuminate\Http\Request;
use Exception;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the payments.
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Payment::query();

        if ($request->search) {
            $search = $request->search;
            Payment::search($query, $search);
        }

        $records = $query->paginate(20);

        return $this->renderView('pages.payments.list', compact('records'));
    }

    /**
     * Show the form for creating a new payment.
     * @return \Illuminate\View\View
     */
    public function add()
    {
        $levels = Levels::where('is_active', 1)->get();
        return $this->renderView('pages.admin_payment.admin', compact('levels'));
    }

    /**
     * Store a newly created payment in the database.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'levels' => 'required|array',
            'levels.*' => 'exists:levels,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive,pending',
            'description' => 'nullable|string'
        ]);

        try {
            $payment = new Payment();
            $payment->payment_name = $request->payment_name;
            $payment->amount = $request->amount;
            $payment->start_date = $request->start_date;
            $payment->end_date = $request->end_date;
            $payment->status = $request->status;
            $payment->description = $request->description;
            $payment->save();

            // Sync the levels
            $payment->levels()->sync($request->levels);

            return redirect()->route('payments.index')
                ->with('success', 'Payment created successfully');
        }
        catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred: ' . $exception->getMessage()]);
        }
    }

    /**
     * Display the specified payment.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $record = Payment::with('levels')->findOrFail($id);
        return $this->renderView('pages.payments.view', compact('record'));
    }

    /**
     * Show the form for editing the specified payment.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $record = Payment::with('levels')->findOrFail($id);
        $levels = Levels::where('is_active', 1)->get();
        return $this->renderView('pages.payments.edit', compact('record', 'levels'));
    }

    /**
     * Update the specified payment in the database.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'payment_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'levels' => 'required|array',
            'levels.*' => 'exists:levels,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive,pending',
            'description' => 'nullable|string'
        ]);

        try {
            $payment = Payment::findOrFail($id);
            $payment->payment_name = $request->payment_name;
            $payment->amount = $request->amount;
            $payment->start_date = $request->start_date;
            $payment->end_date = $request->end_date;
            $payment->status = $request->status;
            $payment->description = $request->description;
            $payment->save();

            // Sync the levels
            $payment->levels()->sync($request->levels);

            return redirect()->route('payments.index')
                ->with('success', 'Payment updated successfully');
        }
        catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred: ' . $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified payment from the database.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->levels()->detach(); // Remove all associated levels
            $payment->delete();

            return redirect()->route('payments.index')
                ->with('success', 'Payment deleted successfully');
        }
        catch (Exception $exception) {
            return back()->withErrors(['error' => 'Unexpected error occurred: ' . $exception->getMessage()]);
        }
    }

    /**
     * Render the view with common data.
     * @param string $view
     * @param array $data
     * @return \Illuminate\View\View
     */
     function renderView($view, $data = [])
    {
        $data['pageTitle'] = $data['pageTitle'] ?? 'Payments';
        $data['show_header'] = $data['show_header'] ?? true;
        $data['layout'] = $data['layout'] ?? 'layouts.app';

        return view($view, $data);
    }
}
