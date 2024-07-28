<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinalProjectsAddRequest;
use App\Http\Requests\FinalProjectsEditRequest;
use App\Models\FinalProjects;
use Illuminate\Http\Request;
use Exception;
class FinalProjectsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.finalprojects.list";
		$query = FinalProjects::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			FinalProjects::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "final_projects.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, FinalProjects::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = FinalProjects::query();
		$record = $query->findOrFail($rec_id, FinalProjects::viewFields());
		return $this->renderView("pages.finalprojects.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return view("pages.finalprojects.add");
	}
	

	/**
     * Insert multiple record into the database table
     * @return \Illuminate\Http\Response
     */
	function store(FinalProjectsAddRequest $request){
		$postdata = $request->input("row");
		$modeldata = array_values($postdata);
		FinalProjects::insert($modeldata);
		return $this->redirect("finalprojects", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(FinalProjectsEditRequest $request, $rec_id = null){
		$query = FinalProjects::query();
		$record = $query->findOrFail($rec_id, FinalProjects::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("finalprojects", "Record updated successfully");
		}
		return $this->renderView("pages.finalprojects.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = FinalProjects::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
