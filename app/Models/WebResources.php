<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebResources extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_resources';
	

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
		'icon','title','text','position','updated_by'
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
				web_resources.id LIKE ?  OR 
				web_resources.icon LIKE ?  OR 
				web_resources.title LIKE ?  OR 
				web_resources.text LIKE ? 
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
			"web_resources.id AS id",
			"web_resources.icon AS icon",
			"web_resources.title AS title",
			"web_resources.text AS text",
			"web_resources.position AS position",
			"web_resources.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_resources.updated_at AS updated_at" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_resources.id AS id",
			"web_resources.icon AS icon",
			"web_resources.title AS title",
			"web_resources.text AS text",
			"web_resources.position AS position",
			"web_resources.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_resources.updated_at AS updated_at" 
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
			"title",
			"text",
			"position",
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
			"icon",
			"title",
			"text",
			"position",
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
			"icon",
			"title",
			"text",
			"position",
			"updated_by",
			"id" 
		];
	}
}
