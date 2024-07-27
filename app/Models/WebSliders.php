<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebSliders extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_sliders';
	

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
		'image','caption','text','updated_by','position'
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
				web_sliders.id LIKE ?  OR 
				web_sliders.caption LIKE ?  OR 
				web_sliders.text LIKE ? 
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
			"web_sliders.id AS id",
			"web_sliders.image AS image",
			"web_sliders.caption AS caption",
			"web_sliders.text AS text",
			"web_sliders.updated_at AS updated_at",
			"web_sliders.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_sliders.position AS position" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_sliders.id AS id",
			"web_sliders.image AS image",
			"web_sliders.caption AS caption",
			"web_sliders.text AS text",
			"web_sliders.updated_at AS updated_at",
			"web_sliders.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_sliders.position AS position" 
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
			"caption",
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
			"image",
			"caption",
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
			"image",
			"caption",
			"text",
			"updated_by",
			"position",
			"id" 
		];
	}
}
