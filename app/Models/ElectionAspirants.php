<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ElectionAspirants extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'election_aspirants';
	

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
		'academic_session','position_id','user_id','name','votes','payment_status'
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
				election_aspirants.id LIKE ?  OR 
				election_aspirants.name LIKE ? 
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
			"election_aspirants.id AS id",
			"election_aspirants.user_id AS user_id",
			"users.lastname AS users_lastname",
			"election_aspirants.name AS name",
			"election_aspirants.position_id AS position_id",
			"election_positions.name AS electionpositions_name",
			"election_aspirants.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"election_aspirants.votes AS votes",
			"election_aspirants.created_at AS created_at",
			"election_aspirants.payment_status AS payment_status" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"election_aspirants.id AS id",
			"election_aspirants.user_id AS user_id",
			"users.lastname AS users_lastname",
			"election_aspirants.name AS name",
			"election_aspirants.position_id AS position_id",
			"election_positions.name AS electionpositions_name",
			"election_aspirants.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"election_aspirants.votes AS votes",
			"election_aspirants.created_at AS created_at",
			"election_aspirants.payment_status AS payment_status" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"election_aspirants.id AS id",
			"election_aspirants.user_id AS user_id",
			"users.lastname AS users_lastname",
			"election_aspirants.name AS name",
			"election_aspirants.position_id AS position_id",
			"election_positions.name AS electionpositions_name",
			"election_aspirants.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"election_aspirants.votes AS votes",
			"election_aspirants.created_at AS created_at",
			"election_aspirants.updated_at AS updated_at",
			"election_aspirants.payment_status AS payment_status" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"election_aspirants.id AS id",
			"election_aspirants.user_id AS user_id",
			"users.lastname AS users_lastname",
			"election_aspirants.name AS name",
			"election_aspirants.position_id AS position_id",
			"election_positions.name AS electionpositions_name",
			"election_aspirants.academic_session AS academic_session",
			"academic_sessions.session_name AS academicsessions_session_name",
			"election_aspirants.votes AS votes",
			"election_aspirants.created_at AS created_at",
			"election_aspirants.updated_at AS updated_at",
			"election_aspirants.payment_status AS payment_status" 
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
			"position_id",
			"user_id",
			"name",
			"votes",
			"payment_status",
			"id" 
		];
	}
}
