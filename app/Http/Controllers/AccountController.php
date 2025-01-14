<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Http\Requests\UsersAccountEditRequest;
use App\Models\PriceSettings;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cookie;
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends Controller{

	/**
     * Select user account data
     * @return \Illuminate\View\View
     */
	function index(){
		$rec_id = Auth::id();
		$query = Users::query();
		$query->join("levels", "users.level_id", "=", "levels.id");
		$query->join("roles", "users.user_role_id", "=", "roles.role_id");
		$record = $query->find($rec_id, Users::accountviewFields());
		if(!$record){
			return $this->reject("No record found", 404);
		}
		return $this->renderView("pages.account.view", ["data" => $record, "rec_id" => $rec_id]);
	}


	/**
     * Update user account data
     * @return \Illuminate\View\View;
     */
	function edit(UsersAccountEditRequest $request){

        $levelID = $request->level_id;
        if
        ($levelID = 2 OR $levelID = 3 OR $levelID = 5 OR $levelID = 6){
            Cookie::queue('level_id', $levelID, 60);
            $price_setting = PriceSettings::where('level_id', $levelID)->first();

            if ($price_setting) {

                $amount = $price_setting->amount;
            } else {
                $amount = 1500;
            }


            $callbackUrl = URL::to('/payment_callback');

            $response = makePayment($amount, auth()->user()->email, $callbackUrl);
            $checkoutLink  = $response['checkoutLink'];
            //	$result['data']['checkoutLink'];
            $user['checkoutLink'] = $checkoutLink;
            $user['or_password'] = $request->password;
            if ($response) {
                Transactions::create([
                    'user_id' => Auth::id(),
                    'price_settings_id' => $price_setting->id,
                    'email' =>  auth()->user()->email,
                    'amount' =>    $amount,
                    'fullname' =>   $request->lastname . " " . $request->firstname,
                    'phone_number' => $request->phone,
                    'callback_url' => $callbackUrl,
                    'reference' =>  $response['orderReference'],
                    'authorization_url' =>  $response['checkoutLink'],
                    'purpose_name' =>  'profile_update',
                ]);

                return redirect()->away($checkoutLink);
            }



        }
		$rec_id = Auth::id();
		$query = Users::query();
		$user = $query->findOrFail($rec_id, Users::accounteditFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());

		if( array_key_exists("image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['image'], "image");
			$modeldata['image'] = $fileInfo['filepath'];
		}
			$user->update($modeldata);
			return $this->redirect("account", "Record updated successfully");
		}
		return $this->renderView("pages.account.edit", ["data" => $user, "rec_id" => $rec_id]);
	}


	/**
     * Change user account password
     * @return \Illuminate\Http\Response
     */
	public function changepassword(Request $request)
	{
		$request->validate([
			'oldpassword' => ['required'],
			'newpassword' => ['required'],
			'confirmpassword' => ['same:newpassword'],
		]);
		$userid = auth()->id();
		$user = Users::find($userid);
		$oldPasswordText = $request->oldpassword;
		$oldPasswordHash = $user->password;
		if(!Hash::check($oldPasswordText, $oldPasswordHash)){
			return back()->withErrors(["Current password is incorrect"]);
		}
		$modeldata = ['password' => Hash::make($request->newpassword)];
		$user->update($modeldata);
		return $this->redirect("/account", "Password change completed");
	}
}
