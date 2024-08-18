<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupervisorUsers extends Model
{


	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'supervisor_users';


	/**
	 * The table primary key field
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';


	/**
	 * Table fillable fields
	 *
	 * @var array
	 */
	protected $fillable = [
		'supervisor_id',
		'user_id',
		'admin_id',
		'updated_at'
	];
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

					users.firstname LIKE ?  OR
				users.lastname LIKE ?  OR

				users.matno LIKE ?
		)';
		$search_params = [
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
			"supervisor_users.id AS s_id",
			"supervisor_id",

			"users.lastname AS users_lastname",
			"users.firstname AS users_firstname",
			"users.matno AS users_matno",
			"project_supervisors.name AS project_supervisors_name",
			"user_id",
			"admin_id",
			"supervisor_users.updated_at AS s_updated",
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
			"id",
			"supervisor_id",
			"user_id",
			"admin_id",
			"created_at",
			"updated_at"
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
			"supervisor_id",
			"user_id",
			"admin_id",
			"created_at",
			"updated_at"
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
			"supervisor_id",
			"user_id",
			"admin_id",
			"created_at",
			"updated_at"
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
			"supervisor_id",
			"user_id",
			"admin_id",
			"id"
		];
	}
}
