<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContestCategoriesAddRequest;
use App\Http\Requests\ContestCategoriesEditRequest;
use App\Models\ContestCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class ContestCategoriesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.contestcategories.list";
		$query = ContestCategories::query();
		$limit = $request->limit ?? 100;
		if($request->search){
			$search = trim($request->search);
			ContestCategories::search($query, $search); // search table records
		}
		$query->join("academic_sessions", "contest_categories.academic_session_id", "=", "academic_sessions.id");
		$query->join("users", "contest_categories.updated_by", "=", "users.id");
		$orderby = $request->orderby ?? "contest_categories.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->academic_session_id){
			$val = $request->academic_session_id;
			$query->where(DB::raw("contest_categories.academic_session_id"), "=", $val);
		}
		$records = $query->paginate($limit, ContestCategories::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ContestCategories::query();
		$query->join("academic_sessions", "contest_categories.academic_session_id", "=", "academic_sessions.id");
		$query->join("users", "contest_categories.updated_by", "=", "users.id");
		$record = $query->findOrFail($rec_id, ContestCategories::viewFields());
		return $this->renderView("pages.contestcategories.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.contestcategories.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.contestcategories.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ContestCategoriesAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save ContestCategories record
		$record = ContestCategories::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("contestcategories", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ContestCategoriesEditRequest $request, $rec_id = null){
		$query = ContestCategories::query();
		$record = $query->findOrFail($rec_id, ContestCategories::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("contestcategories", "Record updated successfully");
		}
		return $this->renderView("pages.contestcategories.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ContestCategories::query();
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
	function category_list(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.contestcategories.category_list";
		$query = ContestCategories::query();
		$limit = $request->limit ?? 50;
		if($request->search){
			$search = trim($request->search);
			ContestCategories::search($query, $search); // search table records
		}
		$query->join("academic_sessions", "contest_categories.academic_session_id", "=", "academic_sessions.id");
		if($request->orderby){
			$orderby = $request->orderby;
			$ordertype = ($request->ordertype ? $request->ordertype : "desc");
			$query->orderBy($orderby, $ordertype);
		}
		else{
			$query->orderBy("contest_categories.name", "ASC");
		}
		$query->where("academic_session_id", "=" , 1);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ContestCategories::categoryListFields());
		return $this->renderView($view, compact("records"));
	}
}
