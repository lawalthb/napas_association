<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElectionAspirantsAddRequest;
use App\Http\Requests\ElectionAspirantsEditRequest;
use App\Models\ElectionAspirants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class ElectionAspirantsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.electionaspirants.list";
		$query = ElectionAspirants::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ElectionAspirants::search($query, $search); // search table records
		}
		$query->join("users", "election_aspirants.user_id", "=", "users.id");
		$query->join("election_positions", "election_aspirants.position_id", "=", "election_positions.id");
		$query->join("academic_sessions", "election_aspirants.academic_session", "=", "academic_sessions.id");
		$orderby = $request->orderby ?? "election_aspirants.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->position_id){
			$val = $request->position_id;
			$query->where(DB::raw("election_aspirants.position_id"), "=", $val);
		}
		if($request->academic_session){
			$val = $request->academic_session;
			$query->where(DB::raw("election_aspirants.academic_session"), "=", $val);
		}
		$records = $query->paginate($limit, ElectionAspirants::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ElectionAspirants::query();
		$query->join("users", "election_aspirants.user_id", "=", "users.id");
		$query->join("election_positions", "election_aspirants.position_id", "=", "election_positions.id");
		$query->join("academic_sessions", "election_aspirants.academic_session", "=", "academic_sessions.id");
		$record = $query->findOrFail($rec_id, ElectionAspirants::viewFields());
		return $this->renderView("pages.electionaspirants.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.electionaspirants.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.electionaspirants.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ElectionAspirantsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save ElectionAspirants record
		$record = ElectionAspirants::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("electionaspirants", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ElectionAspirantsEditRequest $request, $rec_id = null){
		$query = ElectionAspirants::query();
		$record = $query->findOrFail($rec_id, ElectionAspirants::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("electionaspirants", "Record updated successfully");
		}
		return $this->renderView("pages.electionaspirants.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = ElectionAspirants::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
