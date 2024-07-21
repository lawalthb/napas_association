<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ContestNominees extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'contest_nominees';
	

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
		'user_id','name','category_id','academic_session','vote_link','votes','slug','payment_status'
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
				name LIKE ?  OR 
				vote_link LIKE ?  OR 
				slug LIKE ? 
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
			"id",
			"user_id",
			"name",
			"category_id",
			"academic_session",
			"vote_link",
			"votes",
			"slug",
			"created_at",
			"updated_at",
			"payment_status" 
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
			"user_id",
			"name",
			"category_id",
			"academic_session",
			"vote_link",
			"votes",
			"slug",
			"created_at",
			"updated_at",
			"payment_status" 
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
			"user_id",
			"name",
			"category_id",
			"academic_session",
			"vote_link",
			"votes",
			"slug",
			"created_at",
			"updated_at",
			"payment_status" 
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
			"user_id",
			"name",
			"category_id",
			"academic_session",
			"vote_link",
			"votes",
			"slug",
			"created_at",
			"updated_at",
			"payment_status" 
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
			"user_id",
			"name",
			"category_id",
			"academic_session",
			"vote_link",
			"votes",
			"slug",
			"payment_status" 
		];
	}
}
