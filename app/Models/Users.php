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
	protected $fillable = ['firstname', 'lastname', 'phone', 'email', 'password', 'level_id', 'matno', 'member_type', 'expectation_msg', 'image', 'nickname', 'session_start', 'session_end', 'is_active', 'is_ban', 'fee_paid', 'role', 'bio', 'dob', 'facebook_link', 'x_link', 'linkedin_link', 'user_role_id'];
	public $timestamps = false;


	/**
	 * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
	 */
	public static function search($query, $text)
	{
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
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%",
			"%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}


	/**
	 * return list page fields of the model.
	 *
	 * @return array
	 */
	public static function listFields()
	{
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
			"users.image AS image",
			"users.user_role_id AS user_role_id"
		];
	}


	/**
	 * return exportList page fields of the model.
	 *
	 * @return array
	 */
	public static function exportListFields()
	{
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
			"users.image AS image",
			"users.user_role_id AS user_role_id"
		];
	}


	/**
	 * return view page fields of the model.
	 *
	 * @return array
	 */
	public static function viewFields()
	{
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
			"level_id",
			"user_role_id"
		];
	}


	/**
	 * return exportView page fields of the model.
	 *
	 * @return array
	 */
	public static function exportViewFields()
	{
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
			"level_id",
			"user_role_id"
		];
	}


	/**
	 * return accountedit page fields of the model.
	 *
	 * @return array
	 */
	public static function accounteditFields()
	{
		return [
			"firstname",
			"lastname",
			"nickname",
			"matno",
			"phone",
			"member_type",
			"expectation_msg",
			"bio",
			"dob",
			"image",
			"facebook_link",
			"x_link",
			"linkedin_link",
			"level_id",
			"id"
		];
	}


	/**
	 * return accountview page fields of the model.
	 *
	 * @return array
	 */
	public static function accountviewFields()
	{
		return [
			"users.id AS id",
			"users.firstname AS firstname",
			"users.lastname AS lastname",
			"users.nickname AS nickname",
			"users.email AS email",
			"users.matno AS matno",
			"users.phone AS phone",
			"users.member_type AS member_type",
			"users.expectation_msg AS expectation_msg",
			"users.session_start AS session_start",
			"users.session_end AS session_end",
			"users.created_at AS created_at",
			"users.updated_at AS updated_at",
			"users.is_active AS is_active",
			"users.is_ban AS is_ban",
			"users.fee_paid AS fee_paid",
			"users.role AS role",
			"users.bio AS bio",
			"users.dob AS dob",
			"users.facebook_link AS facebook_link",
			"users.x_link AS x_link",
			"users.linkedin_link AS linkedin_link",
			"users.email_verified_at AS email_verified_at",
			"users.level_id AS level_id",
			"levels.name AS levels_name",
			"users.user_role_id AS user_role_id",
			"roles.role_name AS roles_role_name"
		];
	}


	/**
	 * return exportAccountview page fields of the model.
	 *
	 * @return array
	 */
	public static function exportAccountviewFields()
	{
		return [
			"users.id AS id",
			"users.firstname AS firstname",
			"users.lastname AS lastname",
			"users.nickname AS nickname",
			"users.email AS email",
			"users.matno AS matno",
			"users.phone AS phone",
			"users.member_type AS member_type",
			"users.expectation_msg AS expectation_msg",
			"users.session_start AS session_start",
			"users.session_end AS session_end",
			"users.created_at AS created_at",
			"users.updated_at AS updated_at",
			"users.is_active AS is_active",
			"users.is_ban AS is_ban",
			"users.fee_paid AS fee_paid",
			"users.role AS role",
			"users.bio AS bio",
			"users.dob AS dob",
			"users.facebook_link AS facebook_link",
			"users.x_link AS x_link",
			"users.linkedin_link AS linkedin_link",
			"users.email_verified_at AS email_verified_at",
			"users.level_id AS level_id",
			"levels.name AS levels_name",
			"users.user_role_id AS user_role_id",
			"roles.role_name AS roles_role_name"
		];
	}


	/**
	 * return edit page fields of the model.
	 *
	 * @return array
	 */
	public static function editFields()
	{
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
			"user_role_id",
			"id"
		];
	}


	/**
	 * Get current user name
	 * @return string
	 */
	public function UserName()
	{
		return $this->firstname;
	}


	/**
	 * Get current user id
	 * @return string
	 */
	public function UserId()
	{
		return $this->id;
	}
	public function UserEmail()
	{
		return $this->email;
	}
	public function UserPhoto()
	{
		return $this->image;
	}
	public function UserRole()
	{
		return $this->user_role_id;
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

	private $roleNames = [];
	private $userPages = [];

	/**
	 * Get the permissions of the user.
	 */
	public function permissions()
	{
		return $this->hasMany(Permissions::class, 'role_id', 'user_role_id');
	}

	/**
	 * Get the roles of the user.
	 */
	public function roles()
	{
		return $this->hasMany(Roles::class, 'role_id', 'user_role_id');
	}

	/**
	 * set user role
	 */
	public function assignRole($roleName)
	{
		$roleId = Roles::select('role_id')->where('role_name', $roleName)->value('role_id');
		$this->user_role_id = $roleId;
		$this->save();
	}

	/**
	 * return list of pages user can access
	 * @return array
	 */
	public function getUserPages()
	{
		if (empty($this->userPages)) { // ensure we make db query once
			$this->userPages = $this->permissions()->pluck('permission')->toArray();
		}
		return $this->userPages;
	}

	/**
	 * return user role names
	 * @return array
	 */
	public function getRoleNames()
	{
		if (empty($this->roleNames)) { // ensure we make db query once
			$this->roleNames = $this->roles()->pluck('role_name')->toArray();
		}
		return $this->roleNames;
	}

	/**
	 * check if user has a role
	 * @return bool
	 */
	public function hasRole($arrRoles)
	{
		if (!is_array($arrRoles)) {
			$arrRoles = [$arrRoles];
		}
		$userRoles = $this->getRoleNames();
		if (array_intersect(array_map('strtolower', $userRoles), array_map('strtolower', $arrRoles))) {
			return true;
		}
		return false;
	}

	/**
	 * check if user is the owner of the record
	 * @return bool
	 */
	public function isOwner($recId)
	{
		return $this->UserId() == $recId;
	}

	/**
	 * check if user can access page
	 * @return bool
	 */
	public function canAccess($path)
	{
		$userPages = $this->getUserPages();
		$arrPaths = explode("/", strtolower($path));
		$page = $arrPaths[0] ?? "home";
		$action = $arrPaths[1] ?? "index";
		$page_path = "$page/$action";
		return in_array($page_path, $userPages);
	}

	/**
	 * check if user is the owner of the record or has role that can edit or delete it
	 * @return bool
	 */
	public function canManage($path, $recId)
	{
		return false;
	}


	/**
	 * return homeList page fields of the model.
	 *
	 * @return array
	 */
	public static function homeListFields()
	{
		return [
			"id",
			"firstname",
			"lastname",
			"email",
			"matno",
			"phone"
		];
	}
}
