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
class ComponentsData
{


	/**
	 * value_option_list Model Action
	 * @return array
	 */
	function value_option_list()
	{
		$sqltext = "";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * academic_session_id_option_list Model Action
	 * @return array
	 */
	function academic_session_id_option_list()
	{
		$sqltext = "SELECT id as value, session_name as label FROM academic_sessions";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * updated_by_option_list Model Action
	 * @return array
	 */
	function updated_by_option_list()
	{
		$sqltext = "SELECT id as value, firstname as label FROM users";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * category_id_option_list Model Action
	 * @return array
	 */
	function category_id_option_list($value = null)
	{
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM contest_categories WHERE academic_session_id=:lookup_academic_session ORDER BY name ASC";
		$query_params = [];
		$query_params['lookup_academic_session'] = $lookup_value;
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * user_id_option_list Model Action
	 * @return array
	 */
	function user_id_option_list()
	{
		$arr = [];
		if (request()->search) {
			$search = trim(request()->search);
			$sqltext = "SELECT  DISTINCT id AS value, CONCAT(firstname, ' ', lastname, ' ', matno) AS label FROM users WHERE firstname LIKE  :search OR matno LIKE :search ORDER BY id ASC LIMIT 10";
			$query_params = [];
			$query_params['search'] = "%$search%";
			$arr = DB::select($sqltext, $query_params);
		}
		return $arr;
	}


	/**
	 * contestvotes_category_id_option_list Model Action
	 * @return array
	 */
	function contestvotes_category_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM contest_categories";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * position_id_option_list Model Action
	 * @return array
	 */
	function position_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM election_positions";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * aspirant_id_option_list Model Action
	 * @return array
	 */
	function aspirant_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM election_aspirants";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * finalprojects_user_id_option_list Model Action
	 * @return array
	 */
	function finalprojects_user_id_option_list()
	{
		$sqltext = "SELECT  DISTINCT id AS value,lastname AS label FROM users ORDER BY lastname ASC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * level_id_option_list Model Action
	 * @return array
	 */
	function level_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM levels";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * Check if value already exist in FinalProjects table
	 * @param string $value
	 * @return bool
	 */
	function finalprojects_user_id_value_exist(Request $request)
	{
		$value = trim($request->value);
		$exist = DB::table('final_projects')->where('user_id', $value)->value('user_id');
		if ($exist) {
			return true;
		}
		return false;
	}


	/**
	 * permission_option_list Model Action
	 * @return array
	 */
	function permission_option_list()
	{
		$sqltext = "SELECT  DISTINCT permission AS value,permission AS label FROM permissions where role_id=4 ORDER BY permission ASC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * role_id_option_list Model Action
	 * @return array
	 */
	function role_id_option_list()
	{
		$sqltext = "SELECT  DISTINCT role_id AS value,role_name AS label FROM roles ORDER BY role_name ASC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * resourceitems_category_id_option_list Model Action
	 * @return array
	 */
	function resourceitems_category_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM resource_categories";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * resources_id_option_list Model Action
	 * @return array
	 */
	function resources_id_option_list()
	{
		$sqltext = "SELECT id as value, title as label FROM resource_items";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * supervisor_id_option_list Model Action
	 * @return array
	 */
	function supervisor_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM project_supervisors";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * price_settings_id_option_list Model Action
	 * @return array
	 */
	function price_settings_id_option_list()
	{
		$sqltext = "SELECT id as value, name as label FROM price_settings";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * Check if value already exist in Users table
	 * @param string $value
	 * @return bool
	 */
	function users_phone_value_exist(Request $request)
	{
		$value = trim($request->value);
		$exist = DB::table('users')->where('phone', $value)->value('phone');
		if ($exist) {
			return true;
		}
		return false;
	}


	/**
	 * Check if value already exist in Users table
	 * @param string $value
	 * @return bool
	 */
	function users_email_value_exist(Request $request)
	{
		$value = trim($request->value);
		$exist = DB::table('users')->where('email', $value)->value('email');
		if ($exist) {
			return true;
		}
		return false;
	}


	/**
	 * users_level_id_option_list Model Action
	 * @return array
	 */
	function users_level_id_option_list()
	{
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM levels ORDER BY name ASC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * Check if value already exist in Users table
	 * @param string $value
	 * @return bool
	 */
	function users_firstname_value_exist(Request $request)
	{
		$value = trim($request->value);
		$exist = DB::table('users')->where('firstname', $value)->value('firstname');
		if ($exist) {
			return true;
		}
		return false;
	}


	/**
	 * user_role_id_option_list Model Action
	 * @return array
	 */
	function user_role_id_option_list()
	{
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * academic_session_id_option_list_2 Model Action
	 * @return array
	 */
	function academic_session_id_option_list_2()
	{
		$sqltext = "SELECT  DISTINCT id AS value,session_name AS label FROM academic_sessions ORDER BY id DESC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * category_id_option_list_2 Model Action
	 * @return array
	 */
	function category_id_option_list_2()
	{
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM contest_categories ORDER BY id DESC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * position_id_option_list_2 Model Action
	 * @return array
	 */
	function position_id_option_list_2()
	{
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM election_positions ORDER BY id DESC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * electionaspirants_academic_session_autofill Model Action
	 * @return array
	 */
	function electionaspirants_academic_session_autofill()
	{
		$sqltext = "SELECT session_name FROM academic_sessions WHERE session_name=:value";
		$query_params = [];
		$query_params['value'] = request()->get('value');
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * name_option_list Model Action
	 * @return array
	 */
	function name_option_list()
	{
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM resource_categories ORDER BY name ASC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * category_id_option_list_3 Model Action
	 * @return array
	 */
	function category_id_option_list_3()
	{
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM resource_categories ORDER BY name ASC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}


	/**
	 * getcount_ Model Action
	 * @return int
	 */
	function getcount_()
	{
		$sqltext = "SELECT SUM(amount) AS num  FROM transactions WHERE `status` = 'Success'";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * price_settings_id_option_list_2 Model Action
	 * @return array
	 */
	function price_settings_id_option_list_2()
	{
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM price_settings ORDER BY name DESC";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}

	function getcount()
	{
		$sqltext = "SELECT session_name AS num FROM academic_sessions WHERE `is_active` = 'Yes'";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_members Model Action
	 * @return int
	 */
	function getcount_members()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM users WHERE user_role_id =2";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_admins Model Action
	 * @return int
	 */
	function getcount_admins()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM users WHERE user_role_id =1";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_supervisors Model Action
	 * @return int
	 */
	function getcount_supervisors()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM project_supervisors";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_resourceitems Model Action
	 * @return int
	 */
	function getcount_resourceitems()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM resource_items";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_purchaseresources Model Action
	 * @return int
	 */
	function getcount_purchaseresources()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM resources_paids";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_electionaspirants Model Action
	 * @return int
	 */
	function getcount_electionaspirants()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM election_aspirants";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}


	/**
	 * getcount_contestnominees Model Action
	 * @return int
	 */
	function getcount_contestnominees()
	{
		$sqltext = "SELECT COUNT(*) AS num FROM contest_nominees";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
}
