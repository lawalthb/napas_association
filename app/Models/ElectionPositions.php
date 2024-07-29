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
		'academic_session','name','form_amt','admin_id','positioning'
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
				academic_sessions.session_name LIKE ?  OR 
				election_positions.name LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%"
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
			"academic_sessions.session_name AS academicsessions_session_name",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.updated_at AS updated_at",
			"election_positions.positioning AS positioning",
			"election_positions.admin_id AS admin_id",
			"users.lastname AS users_lastname",
			"academic_sessions.id AS academicsessions_id" 
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
			"academic_sessions.session_name AS academicsessions_session_name",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.updated_at AS updated_at",
			"election_positions.positioning AS positioning",
			"election_positions.admin_id AS admin_id",
			"users.lastname AS users_lastname",
			"academic_sessions.id AS academicsessions_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"election_positions.id AS id",
			"election_positions.academic_session AS academic_session",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.admin_id AS admin_id",
			"election_positions.created_at AS created_at",
			"election_positions.updated_at AS updated_at",
			"election_positions.positioning AS positioning",
			"academic_sessions.id AS academicsessions_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"academic_sessions.from_date AS academicsessions_from_date",
			"academic_sessions.to_date AS academicsessions_to_date",
			"academic_sessions.is_active AS academicsessions_is_active",
			"academic_sessions.updated_by AS academicsessions_updated_by",
			"academic_sessions.updated_at AS academicsessions_updated_at",
			"academic_sessions.created_at AS academicsessions_created_at" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"election_positions.id AS id",
			"election_positions.academic_session AS academic_session",
			"election_positions.name AS name",
			"election_positions.form_amt AS form_amt",
			"election_positions.admin_id AS admin_id",
			"election_positions.created_at AS created_at",
			"election_positions.updated_at AS updated_at",
			"election_positions.positioning AS positioning",
			"academic_sessions.id AS academicsessions_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"academic_sessions.from_date AS academicsessions_from_date",
			"academic_sessions.to_date AS academicsessions_to_date",
			"academic_sessions.is_active AS academicsessions_is_active",
			"academic_sessions.updated_by AS academicsessions_updated_by",
			"academic_sessions.updated_at AS academicsessions_updated_at",
			"academic_sessions.created_at AS academicsessions_created_at" 
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
			"name",
			"form_amt",
			"admin_id",
			"positioning",
			"id" 
		];
	}
}
