<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ElectionPositions extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'election_positions';
	

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
		'name','form_amt','admin_id','positioning','academic_session_id'
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
				election_positions.id LIKE ?  OR 
				election_positions.name LIKE ? 
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
			"election_positions.id AS id",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.updated_at AS updated_at",
			"election_positions.positioning AS positioning",
			"election_positions.admin_id AS admin_id",
			"users.lastname AS users_lastname",
			"election_positions.academic_session_id AS academic_session_id",
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
			"election_positions.id AS id",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.updated_at AS updated_at",
			"election_positions.positioning AS positioning",
			"election_positions.admin_id AS admin_id",
			"users.lastname AS users_lastname",
			"election_positions.academic_session_id AS academic_session_id",
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
			"name",
			"form_amt",
			"admin_id",
			"created_at",
			"updated_at",
			"positioning",
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
			"name",
			"form_amt",
			"admin_id",
			"created_at",
			"updated_at",
			"positioning",
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
			"name",
			"form_amt",
			"admin_id",
			"positioning",
			"academic_session_id",
			"id" 
		];
	}
	

	/**
     * return memberList page fields of the model.
     * 
     * @return array
     */
	public static function memberListFields(){
		return [ 
			"election_positions.id AS id",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name" 
		];
	}
	

	/**
     * return exportMemberList page fields of the model.
     * 
     * @return array
     */
	public static function exportMemberListFields(){
		return [ 
			"election_positions.id AS id",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.academic_session_id AS academic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name" 
		];
	}
}
