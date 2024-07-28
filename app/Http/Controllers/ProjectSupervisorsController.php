<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectSupervisorsAddRequest;
use App\Http\Requests\ProjectSupervisorsEditRequest;
use App\Models\ProjectSupervisors;
use Illuminate\Http\Request;
use Exception;
class ProjectSupervisorsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.projectsupervisors.list";
		$query = ProjectSupervisors::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ProjectSupervisors::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "project_supervisors.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ProjectSupervisors::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ProjectSupervisors::query();
		$record = $query->findOrFail($rec_id, ProjectSupervisors::viewFields());
		return $this->renderView("pages.projectsupervisors.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.projectsupervisors.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return view("pages.projectsupervisors.add");
	}
	

	/**
     * Insert multiple record into the database table
     * @return \Illuminate\Http\Response
     */
	function store(ProjectSupervisorsAddRequest $request){
		$postdata = $request->input("row");
		$modeldata = array_values($postdata);
		ProjectSupervisors::insert($modeldata);
		return $this->redirect("projectsupervisors", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ProjectSupervisorsEditRequest $request, $rec_id = null){
		$query = ProjectSupervisors::query();
		$record = $query->findOrFail($rec_id, ProjectSupervisors::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("projectsupervisors", "Record updated successfully");
		}
		return $this->renderView("pages.projectsupervisors.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ProjectSupervisors::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
