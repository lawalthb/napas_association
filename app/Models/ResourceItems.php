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
		'category_id','title','description','file_path','price','published','file_type','download_count'
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
				resource_items.id LIKE ?  OR 
				resource_items.title LIKE ?  OR 
				resource_items.description LIKE ?  OR 
				resource_categories.name LIKE ?  OR 
				resource_categories.id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.price AS price",
			"resource_items.updated_at AS updated_at",
			"resource_items.published AS published",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.id AS resourcecategories_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.price AS price",
			"resource_items.updated_at AS updated_at",
			"resource_items.published AS published",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.id AS resourcecategories_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.category_id AS category_id",
			"resource_items.price AS price",
			"resource_items.download_count AS download_count",
			"resource_items.created_at AS created_at",
			"resource_items.updated_at AS updated_at",
			"resource_items.published AS published",
			"resource_items.file_type AS file_type",
			"resource_categories.id AS resourcecategories_id",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.created_at AS resourcecategories_created_at",
			"resource_categories.updated_at AS resourcecategories_updated_at" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.category_id AS category_id",
			"resource_items.price AS price",
			"resource_items.download_count AS download_count",
			"resource_items.created_at AS created_at",
			"resource_items.updated_at AS updated_at",
			"resource_items.published AS published",
			"resource_items.file_type AS file_type",
			"resource_categories.id AS resourcecategories_id",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.created_at AS resourcecategories_created_at",
			"resource_categories.updated_at AS resourcecategories_updated_at" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"category_id",
			"title",
			"description",
			"file_path",
			"price",
			"published",
			"file_type",
			"id" 
		];
	}
	

	/**
     * return listPdfs page fields of the model.
     * 
     * @return array
     */
	public static function listPdfsFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.category_id AS category_id",
			"resource_categories.name AS resourcecategories_name",
			"resource_items.price AS price",
			"resource_items.published AS published" 
		];
	}
	

	/**
     * return exportListPdfs page fields of the model.
     * 
     * @return array
     */
	public static function exportListPdfsFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.category_id AS category_id",
			"resource_categories.name AS resourcecategories_name",
			"resource_items.price AS price",
			"resource_items.published AS published" 
		];
	}
	

	/**
     * return listVideos page fields of the model.
     * 
     * @return array
     */
	public static function listVideosFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.category_id AS category_id",
			"resource_categories.name AS resourcecategories_name",
			"resource_items.price AS price",
			"resource_items.updated_at AS updated_at",
			"resource_items.published AS published" 
		];
	}
	

	/**
     * return exportListVideos page fields of the model.
     * 
     * @return array
     */
	public static function exportListVideosFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.file_path AS file_path",
			"resource_items.category_id AS category_id",
			"resource_categories.name AS resourcecategories_name",
			"resource_items.price AS price",
			"resource_items.updated_at AS updated_at",
			"resource_items.published AS published" 
		];
	}
	

	/**
     * return memberList page fields of the model.
     * 
     * @return array
     */
	public static function memberListFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.price AS price",
			"resource_items.published AS published",
			"resource_categories.name AS resourcecategories_name",
			"resource_items.file_type AS file_type",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.id AS resourcecategories_id" 
		];
	}
	

	/**
     * return exportMemberList page fields of the model.
     * 
     * @return array
     */
	public static function exportMemberListFields(){
		return [ 
			"resource_items.id AS id",
			"resource_items.title AS title",
			"resource_items.description AS description",
			"resource_items.price AS price",
			"resource_items.published AS published",
			"resource_categories.name AS resourcecategories_name",
			"resource_items.file_type AS file_type",
			"resource_categories.name AS resourcecategories_name",
			"resource_categories.id AS resourcecategories_id" 
		];
	}
	

	/**
     * return editPdf page fields of the model.
     * 
     * @return array
     */
	public static function editPdfFields(){
		return [ 
			"title",
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"published",
			"file_type",
			"id" 
		];
	}
	

	/**
     * return editVideo page fields of the model.
     * 
     * @return array
     */
	public static function editVideoFields(){
		return [ 
			"title",
			"description",
			"file_path",
			"category_id",
			"price",
			"download_count",
			"published",
			"file_type",
			"id" 
		];
	}
}
