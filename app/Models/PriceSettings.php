<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PriceSettings extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'price_settings';
	

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
		'accademic_session_id','level_id','name','amount','is_active','updated_by'
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
				price_settings.id LIKE ?  OR 
				price_settings.name LIKE ? 
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
			"price_settings.id AS id",
			"price_settings.accademic_session_id AS accademic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"price_settings.level_id AS level_id",
			"levels.name AS levels_name",
			"price_settings.name AS name",
			"price_settings.amount AS amount",
			"price_settings.updated_at AS updated_at",
			"price_settings.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"price_settings.is_active AS is_active" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"price_settings.id AS id",
			"price_settings.accademic_session_id AS accademic_session_id",
			"academic_sessions.session_name AS academicsessions_session_name",
			"price_settings.level_id AS level_id",
			"levels.name AS levels_name",
			"price_settings.name AS name",
			"price_settings.amount AS amount",
			"price_settings.updated_at AS updated_at",
			"price_settings.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"price_settings.is_active AS is_active" 
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
			"amount",
			"accademic_session_id",
			"is_active",
			"created_at",
			"updated_at",
			"updated_by",
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
			"name",
			"amount",
			"accademic_session_id",
			"is_active",
			"created_at",
			"updated_at",
			"updated_by",
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
			"accademic_session_id",
			"level_id",
			"name",
			"amount",
			"is_active",
			"updated_by",
			"id" 
		];
	}
}
