<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebVissions extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_vissions';
	

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
		'name','icon','text','updated_by','position'
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
				web_vissions.id LIKE ?  OR 
				web_vissions.name LIKE ?  OR 
				web_vissions.icon LIKE ?  OR 
				web_vissions.text LIKE ? 
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
			"web_vissions.id AS id",
			"web_vissions.name AS name",
			"web_vissions.icon AS icon",
			"web_vissions.text AS text",
			"web_vissions.position AS position",
			"web_vissions.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_vissions.updated_at AS updated_at" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_vissions.id AS id",
			"web_vissions.name AS name",
			"web_vissions.icon AS icon",
			"web_vissions.text AS text",
			"web_vissions.position AS position",
			"web_vissions.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_vissions.updated_at AS updated_at" 
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
			"icon",
			"text",
			"updated_by",
			"updated_at",
			"created_at",
			"position" 
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
			"icon",
			"text",
			"updated_by",
			"updated_at",
			"created_at",
			"position" 
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
			"icon",
			"text",
			"updated_by",
			"position",
			"id" 
		];
	}
}
