<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ResourceItems extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'resource_items';
	

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
		'title','description','file_path','category_id','price','download_count','published'
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
				id LIKE ?  OR 
				title LIKE ?  OR 
				description LIKE ? 
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
			"id",
			"title",
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"created_at",
			"updated_at",
			"published" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"title",
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"created_at",
			"updated_at",
			"published" 
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
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"created_at",
			"updated_at",
			"published" 
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
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"created_at",
			"updated_at",
			"published" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"title",
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"published" 
		];
	}
}
