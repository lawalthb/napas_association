<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FinalProjects extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'final_projects';
	

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
		'user_id','level_id','topic1','topic2','topic3','approve_num','supervisor_topic','has_submit'
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
				topic1 LIKE ?  OR 
				topic2 LIKE ?  OR 
				topic3 LIKE ?  OR 
				supervisor_topic LIKE ? 
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
			"id",
			"user_id",
			"level_id",
			"topic1",
			"topic2",
			"topic3",
			"approve_num",
			"supervisor_topic",
			"has_submit",
			"created_at",
			"updated_at" 
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
			"level_id",
			"topic1",
			"topic2",
			"topic3",
			"approve_num",
			"supervisor_topic",
			"has_submit",
			"created_at",
			"updated_at" 
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
			"level_id",
			"topic1",
			"topic2",
			"topic3",
			"approve_num",
			"supervisor_topic",
			"has_submit",
			"created_at",
			"updated_at" 
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
			"level_id",
			"topic1",
			"topic2",
			"topic3",
			"approve_num",
			"supervisor_topic",
			"has_submit",
			"created_at",
			"updated_at" 
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
			"level_id",
			"topic1",
			"topic2",
			"topic3",
			"approve_num",
			"supervisor_topic",
			"has_submit" 
		];
	}
}
