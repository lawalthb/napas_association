<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebEvents extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_events';
	

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
		'title','short_text','image','long_text','updated_by','position'
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
				web_events.id LIKE ?  OR 
				web_events.title LIKE ?  OR 
				web_events.short_text LIKE ?  OR 
				web_events.long_text LIKE ? 
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
			"web_events.id AS id",
			"web_events.title AS title",
			"web_events.short_text AS short_text",
			"web_events.image AS image",
			"web_events.long_text AS long_text",
			"web_events.updated_at AS updated_at",
			"web_events.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_events.position AS position" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"web_events.id AS id",
			"web_events.title AS title",
			"web_events.short_text AS short_text",
			"web_events.image AS image",
			"web_events.long_text AS long_text",
			"web_events.updated_at AS updated_at",
			"web_events.updated_by AS updated_by",
			"users.lastname AS users_lastname",
			"web_events.position AS position" 
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
			"short_text",
			"image",
			"long_text",
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
			"title",
			"short_text",
			"image",
			"long_text",
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
			"title",
			"short_text",
			"image",
			"long_text",
			"updated_by",
			"position",
			"id" 
		];
	}
}
