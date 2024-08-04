<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Transactions extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'transactions';
	

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
		'user_id','price_settings_id','email','amount','fullname','phone_number','reference','status','authorization_url','callback_url','gateway_response','paid_at','channel','message','orderid','other_info','purpose_name'
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
				transactions.id LIKE ?  OR 
				transactions.fullname LIKE ?  OR 
				transactions.email LIKE ?  OR 
				transactions.phone_number LIKE ?  OR 
				transactions.reference LIKE ?  OR 
				transactions.purpose_name LIKE ?  OR 
				transactions.authorization_url LIKE ?  OR 
				transactions.callback_url LIKE ?  OR 
				transactions.gateway_response LIKE ?  OR 
				transactions.paid_at LIKE ?  OR 
				transactions.channel LIKE ?  OR 
				transactions.message LIKE ?  OR 
				transactions.orderId LIKE ?  OR 
				transactions.other_info LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"transactions.id AS id",
			"transactions.fullname AS fullname",
			"transactions.email AS email",
			"transactions.amount AS amount",
			"transactions.phone_number AS phone_number",
			"transactions.reference AS reference",
			"transactions.created_at AS created_at",
			"transactions.status AS status",
			"price_settings.name AS pricesettings_name" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"transactions.id AS id",
			"transactions.fullname AS fullname",
			"transactions.email AS email",
			"transactions.amount AS amount",
			"transactions.phone_number AS phone_number",
			"transactions.reference AS reference",
			"transactions.created_at AS created_at",
			"transactions.status AS status",
			"price_settings.name AS pricesettings_name" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"transactions.id AS id",
			"transactions.price_settings_id AS price_settings_id",
			"price_settings.name AS pricesettings_name",
			"transactions.email AS email",
			"transactions.amount AS amount",
			"transactions.fullname AS fullname",
			"transactions.phone_number AS phone_number",
			"transactions.reference AS reference",
			"transactions.created_at AS created_at",
			"transactions.status AS status",
			"transactions.gateway_response AS gateway_response",
			"transactions.channel AS channel",
			"transactions.purpose_name AS purpose_name",
			"transactions.user_id AS user_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"transactions.id AS id",
			"transactions.price_settings_id AS price_settings_id",
			"price_settings.name AS pricesettings_name",
			"transactions.email AS email",
			"transactions.amount AS amount",
			"transactions.fullname AS fullname",
			"transactions.phone_number AS phone_number",
			"transactions.reference AS reference",
			"transactions.created_at AS created_at",
			"transactions.status AS status",
			"transactions.gateway_response AS gateway_response",
			"transactions.channel AS channel",
			"transactions.purpose_name AS purpose_name",
			"transactions.user_id AS user_id" 
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
			"price_settings_id",
			"email",
			"amount",
			"fullname",
			"phone_number",
			"reference",
			"status",
			"authorization_url",
			"callback_url",
			"gateway_response",
			"paid_at",
			"channel",
			"message",
			"orderId AS orderid",
			"other_info",
			"purpose_name" 
		];
	}
	

	/**
     * return memberList page fields of the model.
     * 
     * @return array
     */
	public static function memberListFields(){
		return [ 
			"id",
			"email",
			"amount",
			"reference",
			"created_at",
			"status" 
		];
	}
	

	/**
     * return exportMemberList page fields of the model.
     * 
     * @return array
     */
	public static function exportMemberListFields(){
		return [ 
			"id",
			"email",
			"amount",
			"reference",
			"created_at",
			"status" 
		];
	}
	

	/**
     * return memberView page fields of the model.
     * 
     * @return array
     */
	public static function memberViewFields(){
		return [ 
			"transactions.id AS id",
			"transactions.reference AS reference",
			"transactions.fullname AS fullname",
			"transactions.user_id AS user_id",
			"users.lastname AS users_lastname",
			"transactions.email AS email",
			"transactions.price_settings_id AS price_settings_id",
			"price_settings.name AS pricesettings_name",
			"transactions.amount AS amount",
			"transactions.phone_number AS phone_number",
			"transactions.created_at AS created_at",
			"transactions.status AS status",
			"transactions.authorization_url AS authorization_url" 
		];
	}
	

	/**
     * return exportMemberView page fields of the model.
     * 
     * @return array
     */
	public static function exportMemberViewFields(){
		return [ 
			"transactions.id AS id",
			"transactions.reference AS reference",
			"transactions.fullname AS fullname",
			"transactions.user_id AS user_id",
			"users.lastname AS users_lastname",
			"transactions.email AS email",
			"transactions.price_settings_id AS price_settings_id",
			"price_settings.name AS pricesettings_name",
			"transactions.amount AS amount",
			"transactions.phone_number AS phone_number",
			"transactions.created_at AS created_at",
			"transactions.status AS status",
			"transactions.authorization_url AS authorization_url" 
		];
	}
}
