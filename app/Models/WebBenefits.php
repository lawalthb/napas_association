<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebBenefits extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_benefits';
	

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
		'title','icon','text','position','image','updated_by'
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
				web_benefits.id LIKE ?  OR 
				web_benefits.title LIKE ?  OR 
				web_benefits.icon LIKE ?  OR 
				web_benefits.text LIKE ? 
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
			"web_benefits.id AS id",
			"web_benefits.title AS title",
			"web_benefits.icon AS icon",
			"web_benefits.text AS text",
			"web_benefits.position AS position",
			"web_benefits.image AS image",
			"web_benefits.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_benefits.updated_at AS updated_at" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_benefits.id AS id",
			"web_benefits.title AS title",
			"web_benefits.icon AS icon",
			"web_benefits.text AS text",
			"web_benefits.position AS position",
			"web_benefits.image AS image",
			"web_benefits.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_benefits.updated_at AS updated_at" 
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
			"title",
			"icon",
			"text",
			"position",
			"image",
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
			"title",
			"icon",
			"text",
			"position",
			"image",
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
			"title",
			"icon",
			"text",
			"position",
			"image",
			"updated_by",
			"id" 
		];
	}
}
