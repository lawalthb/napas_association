<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebGalleries extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_galleries';
	

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
		'images','position','updated_by','academic_session_id'
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
				web_galleries.id LIKE ? 
		)';
		$search_params = [
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
	public static function listFields(){
		return [ 
			"web_galleries.id AS id",
			"web_galleries.images AS images",
			"web_galleries.position AS position",
			"web_galleries.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_galleries.updated_at AS updated_at",
			"web_galleries.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_galleries.id AS id",
			"web_galleries.images AS images",
			"web_galleries.position AS position",
			"web_galleries.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_galleries.updated_at AS updated_at",
			"web_galleries.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name" 
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
			"images",
			"position",
			"created_at",
			"updated_by",
			"updated_at",
			"academic_session_id" 
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
			"images",
			"position",
			"created_at",
			"updated_by",
			"updated_at",
			"academic_session_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"images",
			"position",
			"updated_by",
			"academic_session_id",
			"id" 
		];
	}
}
