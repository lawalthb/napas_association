<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceItemsAddRequest;
use App\Http\Requests\ResourceItemsEditRequest;
use App\Models\ResourceItems;
use Illuminate\Http\Request;
use Exception;
class ResourceItemsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.resourceitems.list";
		$query = ResourceItems::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ResourceItems::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "resource_items.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ResourceItems::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ResourceItems::query();
		$record = $query->findOrFail($rec_id, ResourceItems::viewFields());
		return $this->renderView("pages.resourceitems.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.resourceitems.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.resourceitems.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ResourceItemsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("file_path", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['file_path'], "file_path");
			$modeldata['file_path'] = $fileInfo['filepath'];
		}
		
		//save ResourceItems record
		$record = ResourceItems::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("resourceitems", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ResourceItemsEditRequest $request, $rec_id = null){
		$query = ResourceItems::query();
		$record = $query->findOrFail($rec_id, ResourceItems::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("file_path", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['file_path'], "file_path");
			$modeldata['file_path'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("resourceitems", "Record updated successfully");
		}
		return $this->renderView("pages.resourceitems.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ResourceItems::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
