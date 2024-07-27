<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebCounters extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_counters';
	

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
		'icon','count','text','position','updated_by'
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
				web_counters.id LIKE ?  OR 
				web_counters.icon LIKE ?  OR 
				web_counters.text LIKE ? 
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
			"web_counters.id AS id",
			"web_counters.icon AS icon",
			"web_counters.count AS count",
			"web_counters.text AS text",
			"web_counters.position AS position",
			"web_counters.updated_by AS updated_by",
			"users.lastname AS users_lastname" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_counters.id AS id",
			"web_counters.icon AS icon",
			"web_counters.count AS count",
			"web_counters.text AS text",
			"web_counters.position AS position",
			"web_counters.updated_by AS updated_by",
			"users.lastname AS users_lastname" 
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
			"icon",
			"count",
			"text",
			"position",
			"updated_at",
			"created_at",
			"updated_by" 
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
			"icon",
			"count",
			"text",
			"position",
			"updated_at",
			"created_at",
			"updated_by" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"icon",
			"count",
			"text",
			"position",
			"updated_by",
			"id" 
		];
	}
}
