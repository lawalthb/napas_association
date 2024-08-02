<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ContestCategories extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'contest_categories';
	

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
		'academic_session_id','name','price','updated_by','positioning'
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
				contest_categories.id LIKE ?  OR 
				contest_categories.name LIKE ? 
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
			"contest_categories.id AS id",
			"contest_categories.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_categories.name AS name",
			"contest_categories.price AS price",
			"contest_categories.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"contest_categories.updated_at AS updated_at",
			"contest_categories.positioning AS positioning" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"contest_categories.id AS id",
			"contest_categories.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_categories.name AS name",
			"contest_categories.price AS price",
			"contest_categories.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"contest_categories.updated_at AS updated_at",
			"contest_categories.positioning AS positioning" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"contest_categories.id AS id",
			"contest_categories.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_categories.name AS name",
			"contest_categories.price AS price",
			"contest_categories.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"contest_categories.created_at AS created_at",
			"contest_categories.updated_at AS updated_at",
			"contest_categories.positioning AS positioning" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"contest_categories.id AS id",
			"contest_categories.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_categories.name AS name",
			"contest_categories.price AS price",
			"contest_categories.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"contest_categories.created_at AS created_at",
			"contest_categories.updated_at AS updated_at",
			"contest_categories.positioning AS positioning" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"academic_session_id",
			"name",
			"price",
			"updated_by",
			"positioning",
			"id" 
		];
	}
}
