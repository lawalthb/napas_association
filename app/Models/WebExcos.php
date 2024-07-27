<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebExcos extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_excos';
	

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
		'image','name','post','position','updated_by'
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
				web_excos.id LIKE ?  OR 
				web_excos.name LIKE ?  OR 
				web_excos.post LIKE ? 
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
			"web_excos.id AS id",
			"web_excos.image AS image",
			"web_excos.name AS name",
			"web_excos.post AS post",
			"web_excos.position AS position",
			"web_excos.updated_at AS updated_at",
			"web_excos.updated_by AS updated_by",
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
			"web_excos.id AS id",
			"web_excos.image AS image",
			"web_excos.name AS name",
			"web_excos.post AS post",
			"web_excos.position AS position",
			"web_excos.updated_at AS updated_at",
			"web_excos.updated_by AS updated_by",
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
			"image",
			"name",
			"post",
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
			"image",
			"name",
			"post",
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
			"image",
			"name",
			"post",
			"position",
			"updated_by",
			"id" 
		];
	}
}
