<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicSessionsAddRequest;
use App\Http\Requests\AcademicSessionsEditRequest;
use App\Models\AcademicSessions;
use Illuminate\Http\Request;
use Exception;
class AcademicSessionsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.academicsessions.list";
		$query = AcademicSessions::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			AcademicSessions::search($query, $search); // search table records
		}
		$query->join("users", "academic_sessions.updated_by", "=", "users.id");
		$orderby = $request->orderby ?? "academic_sessions.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AcademicSessions::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AcademicSessions::query();
		$record = $query->findOrFail($rec_id, AcademicSessions::viewFields());
		return $this->renderView("pages.academicsessions.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.academicsessions.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.academicsessions.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AcademicSessionsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AcademicSessions record
		$record = AcademicSessions::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("academicsessions", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AcademicSessionsEditRequest $request, $rec_id = null){
		$query = AcademicSessions::query();
		$record = $query->findOrFail($rec_id, AcademicSessions::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("academicsessions", "Record updated successfully");
		}
		return $this->renderView("pages.academicsessions.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AcademicSessions::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
