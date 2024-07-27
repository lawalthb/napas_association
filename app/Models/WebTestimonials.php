<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WebTestimonials extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'web_testimonials';
	

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
		'name','picture','testimony','position','updated_by'
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
				web_testimonials.id LIKE ?  OR 
				web_testimonials.name LIKE ?  OR 
				web_testimonials.testimony LIKE ? 
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
			"web_testimonials.id AS id",
			"web_testimonials.name AS name",
			"web_testimonials.picture AS picture",
			"web_testimonials.testimony AS testimony",
			"web_testimonials.position AS position",
			"web_testimonials.updated_at AS updated_at",
			"web_testimonials.updated_by AS updated_by",
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
			"web_testimonials.id AS id",
			"web_testimonials.name AS name",
			"web_testimonials.picture AS picture",
			"web_testimonials.testimony AS testimony",
			"web_testimonials.position AS position",
			"web_testimonials.updated_at AS updated_at",
			"web_testimonials.updated_by AS updated_by",
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
			"name",
			"picture",
			"testimony",
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
			"name",
			"picture",
			"testimony",
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
			"name",
			"picture",
			"testimony",
			"position",
			"updated_by",
			"id" 
		];
	}
}
