<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AcademicSessions extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'academic_sessions';
	

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
		'session_name','from_date','to_date','is_active','updated_by'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				academic_sessions.id LIKE ?  OR 
				academic_sessions.session_name LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%"
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
			"academic_sessions.id AS id",
			"academic_sessions.session_name AS session_name",
			"academic_sessions.from_date AS from_date",
			"academic_sessions.to_date AS to_date",
			"academic_sessions.is_active AS is_active",
			"academic_sessions.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"academic_sessions.updated_at AS updated_at" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"academic_sessions.id AS id",
			"academic_sessions.session_name AS session_name",
			"academic_sessions.from_date AS from_date",
			"academic_sessions.to_date AS to_date",
			"academic_sessions.is_active AS is_active",
			"academic_sessions.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"academic_sessions.updated_at AS updated_at" 
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
			"session_name",
			"from_date",
			"to_date",
			"is_active",
			"updated_by",
			"updated_at",
			"created_at" 
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
			"session_name",
			"from_date",
			"to_date",
			"is_active",
			"updated_by",
			"updated_at",
			"created_at" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"session_name",
			"from_date",
			"to_date",
			"is_active",
			"updated_by",
			"id" 
		];
	}
}
