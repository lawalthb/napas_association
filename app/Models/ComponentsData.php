<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * academic_session_id_option_list Model Action
     * @return array
     */
	function academic_session_id_option_list(){
		$sqltext = "SELECT id as value, session_name as label FROM academic_sessions";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * updated_by_option_list Model Action
     * @return array
     */
	function updated_by_option_list(){
		$sqltext = "SELECT id as value, firstname as label FROM users";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * category_id_option_list Model Action
     * @return array
     */
	function category_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM contest_categories";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * position_id_option_list Model Action
     * @return array
     */
	function position_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM election_positions";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * aspirant_id_option_list Model Action
     * @return array
     */
	function aspirant_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM election_aspirants";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * level_id_option_list Model Action
     * @return array
     */
	function level_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM levels";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * resourceitems_category_id_option_list Model Action
     * @return array
     */
	function resourceitems_category_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM resource_categories";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * resources_id_option_list Model Action
     * @return array
     */
	function resources_id_option_list(){
		$sqltext = "SELECT id as value, title as label FROM resource_items";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * supervisor_id_option_list Model Action
     * @return array
     */
	function supervisor_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM project_supervisors";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * price_settings_id_option_list Model Action
     * @return array
     */
	function price_settings_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM price_settings";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
}
