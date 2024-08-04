<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ContestNominees extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'contest_nominees';
	

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
		'academic_session','category_id','user_id','name','vote_link','votes','payment_status'
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
				contest_nominees.id LIKE ?  OR 
				contest_nominees.name LIKE ?  OR 
				contest_nominees.vote_link LIKE ?  OR 
				contest_nominees.slug LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
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
			"contest_nominees.id AS id",
			"contest_nominees.user_id AS user_id",
			"users.lastname AS users_lastname",
			"contest_nominees.name AS name",
			"contest_nominees.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_nominees.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_nominees.vote_link AS vote_link",
			"contest_nominees.votes AS votes",
			"contest_nominees.updated_at AS updated_at",
			"contest_nominees.payment_status AS payment_status" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"contest_nominees.id AS id",
			"contest_nominees.user_id AS user_id",
			"users.lastname AS users_lastname",
			"contest_nominees.name AS name",
			"contest_nominees.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_nominees.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_nominees.vote_link AS vote_link",
			"contest_nominees.votes AS votes",
			"contest_nominees.updated_at AS updated_at",
			"contest_nominees.payment_status AS payment_status" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"contest_nominees.id AS id",
			"contest_nominees.user_id AS user_id",
			"users.lastname AS users_lastname",
			"contest_nominees.name AS name",
			"contest_nominees.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_nominees.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_nominees.vote_link AS vote_link",
			"contest_nominees.votes AS votes",
			"contest_nominees.created_at AS created_at",
			"contest_nominees.updated_at AS updated_at",
			"contest_nominees.payment_status AS payment_status" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"contest_nominees.id AS id",
			"contest_nominees.user_id AS user_id",
			"users.lastname AS users_lastname",
			"contest_nominees.name AS name",
			"contest_nominees.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_nominees.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"contest_nominees.vote_link AS vote_link",
			"contest_nominees.votes AS votes",
			"contest_nominees.created_at AS created_at",
			"contest_nominees.updated_at AS updated_at",
			"contest_nominees.payment_status AS payment_status" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"academic_session",
			"category_id",
			"user_id",
			"name",
			"vote_link",
			"votes",
			"payment_status",
			"id" 
		];
	}
	

	/**
     * return nomineesList page fields of the model.
     * 
     * @return array
     */
	public static function nomineesListFields(){
		return [ 
			"contest_nominees.id AS id",
			"contest_nominees.name AS name",
			"contest_nominees.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_nominees.vote_link AS vote_link",
			"contest_nominees.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name" 
		];
	}
	

	/**
     * return exportNomineesList page fields of the model.
     * 
     * @return array
     */
	public static function exportNomineesListFields(){
		return [ 
			"contest_nominees.id AS id",
			"contest_nominees.name AS name",
			"contest_nominees.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_nominees.vote_link AS vote_link",
			"contest_nominees.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name" 
		];
	}
}
