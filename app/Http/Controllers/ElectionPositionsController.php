<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElectionPositionsAddRequest;
use App\Http\Requests\ElectionPositionsEditRequest;
use App\Models\ElectionPositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class ElectionPositionsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.electionpositions.list";
		$query = ElectionPositions::query();
		$limit = $request->limit ?? 20;
		if($request->search){
			$search = trim($request->search);
			ElectionPositions::search($query, $search); // search table records
		}
		$query->join("users", "election_positions.admin_id", "=", "users.id");
		$query->join("academic_sessions", "election_positions.academic_session_id", "=", "academic_sessions.id");
		$orderby = $request->orderby ?? "election_positions.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->academic_session_id){
			$val = $request->academic_session_id;
			$query->where(DB::raw("election_positions.academic_session_id"), "=", $val);
		}
		$records = $query->paginate($limit, ElectionPositions::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ElectionPositions::query();
		$record = $query->findOrFail($rec_id, ElectionPositions::viewFields());
		return $this->renderView("pages.electionpositions.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.electionpositions.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.electionpositions.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ElectionPositionsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save ElectionPositions record
		$record = ElectionPositions::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("electionpositions", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ElectionPositionsEditRequest $request, $rec_id = null){
		$query = ElectionPositions::query();
		$record = $query->findOrFail($rec_id, ElectionPositions::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("electionpositions", "Record updated successfully");
		}
		return $this->renderView("pages.electionpositions.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ElectionPositions::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function member_list(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.electionpositions.member_list";
		$query = ElectionPositions::query();
		$limit = $request->limit ?? 50;
		if($request->search){
			$search = trim($request->search);
			ElectionPositions::search($query, $search); // search table records
		}
		$query->join("academic_sessions", "election_positions.academic_session_id", "=", "academic_sessions.id");
		if($request->orderby){
			$orderby = $request->orderby;
			$ordertype = ($request->ordertype ? $request->ordertype : "desc");
			$query->orderBy($orderby, $ordertype);
		}
		else{
			$query->orderBy("election_positions.name", "ASC");
		}
		$query->where("academic_session_id", "=" , 1);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ElectionPositions::memberListFields());
		return $this->renderView($view, compact("records"));
	}
}
