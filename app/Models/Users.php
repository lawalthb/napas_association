<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Users extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'users';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	protected $fillable = ['firstname','lastname','nickname','email','password','matno','phone','level','member_type','expectation_msg','session_start','session_end','is_active','is_ban','fee_paid','role','bio','dob','image','facebook_link','x_link','linkedin_link'];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				firstname LIKE ?  OR 
				lastname LIKE ?  OR 
				nickname LIKE ?  OR 
				email LIKE ?  OR 
				matno LIKE ?  OR 
				phone LIKE ?  OR 
				level LIKE ?  OR 
				expectation_msg LIKE ?  OR 
				session_start LIKE ?  OR 
				session_end LIKE ?  OR 
				bio LIKE ?  OR 
				facebook_link LIKE ?  OR 
				x_link LIKE ?  OR 
				linkedin_link LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"email",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"created_at",
			"updated_at",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"image",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"email_verified_at" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"email",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"created_at",
			"updated_at",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"image",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"email_verified_at" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"email",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"created_at",
			"updated_at",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"email_verified_at" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"email",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"created_at",
			"updated_at",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"email_verified_at" 
		];
	}
	

	/**
     * return accountedit page fields of the model.
     * 
     * @return array
     */
	public static function accounteditFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"image",
			"facebook_link",
			"x_link",
			"linkedin_link" 
		];
	}
	

	/**
     * return accountview page fields of the model.
     * 
     * @return array
     */
	public static function accountviewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"email",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"created_at",
			"updated_at",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"email_verified_at" 
		];
	}
	

	/**
     * return exportAccountview page fields of the model.
     * 
     * @return array
     */
	public static function exportAccountviewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"email",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"created_at",
			"updated_at",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"email_verified_at" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"nickname",
			"matno",
			"phone",
			"level",
			"member_type",
			"expectation_msg",
			"session_start",
			"session_end",
			"is_active",
			"is_ban",
			"fee_paid",
			"role",
			"bio",
			"dob",
			"image",
			"facebook_link",
			"x_link",
			"linkedin_link" 
		];
	}
	

	/**
     * Get current user name
     * @return string
     */
	public function UserName(){
		return $this->firstname;
	}
	

	/**
     * Get current user id
     * @return string
     */
	public function UserId(){
		return $this->id;
	}
	public function UserEmail(){
		return $this->email;
	}
	public function UserPhoto(){
		return $this->image;
	}
	

	/**
     * Send Password reset link to user email 
	 * @param string $token
     * @return string
     */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new \App\Notifications\ResetPassword($token));
	}
	

	/**
     * Send user account verification link to user email
     * @return string
     */
	public function sendEmailVerificationNotification()
	{
		$this->notify(new \App\Notifications\VerifyEmail);
	}
}
