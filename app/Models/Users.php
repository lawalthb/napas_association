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
	protected $fillable = ['firstname','lastname','phone','email','password','level_id','member_type','expectation_msg','image','matno','nickname','session_start','session_end','is_active','is_ban','fee_paid','role','bio','dob','facebook_link','x_link','linkedin_link'];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				users.id LIKE ?  OR 
				users.firstname LIKE ?  OR 
				users.lastname LIKE ?  OR 
				users.nickname LIKE ?  OR 
				users.email LIKE ?  OR 
				users.matno LIKE ?  OR 
				users.phone LIKE ?  OR 
				users.expectation_msg LIKE ?  OR 
				users.session_start LIKE ?  OR 
				users.session_end LIKE ?  OR 
				users.bio LIKE ?  OR 
				users.facebook_link LIKE ?  OR 
				users.x_link LIKE ?  OR 
				users.linkedin_link LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"users.id AS id",
			"users.firstname AS firstname",
			"users.lastname AS lastname",
			"users.nickname AS nickname",
			"users.email AS email",
			"users.matno AS matno",
			"users.phone AS phone",
			"users.level_id AS level_id",
			"levels.name AS levels_name",
			"users.is_active AS is_active",
			"users.role AS role",
			"users.image AS image" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"users.id AS id",
			"users.firstname AS firstname",
			"users.lastname AS lastname",
			"users.nickname AS nickname",
			"users.email AS email",
			"users.matno AS matno",
			"users.phone AS phone",
			"users.level_id AS level_id",
			"levels.name AS levels_name",
			"users.is_active AS is_active",
			"users.role AS role",
			"users.image AS image" 
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
			"email_verified_at",
			"level_id" 
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
			"email_verified_at",
			"level_id" 
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
			"linkedin_link",
			"level_id" 
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
			"email_verified_at",
			"level_id" 
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
			"email_verified_at",
			"level_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"firstname",
			"lastname",
			"nickname",
			"matno",
			"phone",
			"level_id",
			"member_type",
			"is_active",
			"session_start",
			"session_end",
			"expectation_msg",
			"is_ban",
			"fee_paid",
			"role",
			"dob",
			"bio",
			"image",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"id" 
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
