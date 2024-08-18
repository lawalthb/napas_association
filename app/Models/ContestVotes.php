<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContestVotes extends Model
{


	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'contest_votes';


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
		'email',
		'category_id',
		'candidate_id',
		'vote_number',
		'amount',
		'payment_status',
		'ip_address'
	];
	public $timestamps = false;


	/**
	 * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
	 */
	public static function search($query, $text)
	{
		//search table record
		$search_condition = '(
				contest_votes.id LIKE ?  OR
				contest_votes.email LIKE ?  OR
				contest_votes.ip_address LIKE ?
		)';
		$search_params = [
			"%$text%",
			"%$text%",
			"%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}


	/**
	 * return list page fields of the model.
	 *
	 * @return array
	 */
	public static function listFields()
	{
		return [
			"contest_votes.id AS id",
			"contest_votes.email AS email",
			"contest_votes.category_id AS category_id",
			"contest_categories.name AS contestcategories_name",
			"contest_votes.candidate_id AS candidate_id",
			"users.firstname AS users_firstname",
			"users.lastname AS users_lastname",
			"contest_votes.vote_number AS vote_number",
			"contest_votes.amount AS amount",
			"contest_votes.payment_status AS payment_status",
			"contest_votes.updated_at AS updated_at",
			"contest_votes.ip_address AS ip_address"
		];
	}


	/**
	 * return exportList page fields of the model.
	 *
	 * @return array
	 */
	public static function exportListFields()
	{
		return [
			"contest_votes.id AS id",
			"contest_votes.email AS email",
			"contest_votes.category_id AS category_id",
			"contest_votes.candidate_id AS candidate_id",
			"users.firstname AS users_firstname",
			"contest_votes.vote_number AS vote_number",
			"contest_votes.amount AS amount",
			"contest_votes.payment_status AS payment_status",
			"contest_votes.updated_at AS updated_at",
			"contest_votes.ip_address AS ip_address"
		];
	}


	/**
	 * return view page fields of the model.
	 *
	 * @return array
	 */
	public static function viewFields()
	{
		return [
			"id",
			"email",
			"category_id",
			"candidate_id",
			"vote_number",
			"amount",
			"payment_status",
			"created_at",
			"updated_at",
			"ip_address"
		];
	}


	/**
	 * return exportView page fields of the model.
	 *
	 * @return array
	 */
	public static function exportViewFields()
	{
		return [
			"id",
			"email",
			"category_id",
			"candidate_id",
			"vote_number",
			"amount",
			"payment_status",
			"created_at",
			"updated_at",
			"ip_address"
		];
	}


	/**
	 * return edit page fields of the model.
	 *
	 * @return array
	 */
	public static function editFields()
	{
		return [
			"id",
			"email",
			"category_id",
			"candidate_id",
			"vote_number",
			"amount",
			"payment_status",
			"ip_address"
		];
	}
}
