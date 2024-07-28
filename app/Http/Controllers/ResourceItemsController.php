<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceItemsAddRequest;
use App\Http\Requests\ResourceItemsEditRequest;
use App\Http\Requests\ResourceItemsadd_pdfsRequest;
use App\Http\Requests\ResourceItemsadd_videosRequest;
use App\Http\Requests\ResourceItemsedit_pdfRequest;
use App\Http\Requests\ResourceItemsedit_videoRequest;
use App\Models\ResourceItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
		$query->join("resource_categories", "resource_items.category_id", "=", "resource_categories.id");
		$orderby = $request->orderby ?? "resource_items.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("file_type", "=" , "image");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->name){
			$val = $request->name;
			$query->where(DB::raw("resource_categories.name"), "=", $val);
		}
		if($request->published){
			$val = $request->published;
			$query->where(DB::raw("resource_items.published"), "=", $val);
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
		$query->join("resource_categories", "resource_items.category_id", "=", "resource_categories.id");
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
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function list_pdfs(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.resourceitems.list_pdfs";
		$query = ResourceItems::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ResourceItems::search($query, $search); // search table records
		}
		$query->join("resource_categories", "resource_items.category_id", "=", "resource_categories.id");
		$orderby = $request->orderby ?? "resource_items.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("file_type", "=" , "pdf");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->category_id){
			$val = $request->category_id;
			$query->where(DB::raw("resource_items.category_id"), "=", $val);
		}
		if($request->published){
			$val = $request->published;
			$query->where(DB::raw("resource_items.published"), "=", $val);
		}
		$records = $query->paginate($limit, ResourceItems::listPdfsFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function list_videos(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.resourceitems.list_videos";
		$query = ResourceItems::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ResourceItems::search($query, $search); // search table records
		}
		$query->join("resource_categories", "resource_items.category_id", "=", "resource_categories.id");
		$orderby = $request->orderby ?? "resource_items.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("file_type", "=" , "videos");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->category_id){
			$val = $request->category_id;
			$query->where(DB::raw("resource_items.category_id"), "=", $val);
		}
		if($request->published){
			$val = $request->published;
			$query->where(DB::raw("resource_items.published"), "=", $val);
		}
		$records = $query->paginate($limit, ResourceItems::listVideosFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add_pdfs(){
		return $this->renderView("pages.resourceitems.add_pdfs");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add_pdfs_store(ResourceItemsadd_pdfsRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("file_path", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['file_path'], "file_path");
			$modeldata['file_path'] = $fileInfo['filepath'];
		}
		
		//save ResourceItems record
		$record = ResourceItems::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("resourceitems/list_pdfs", "Record added successfully");
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add_videos(){
		return $this->renderView("pages.resourceitems.add_videos");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add_videos_store(ResourceItemsadd_videosRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("file_path", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['file_path'], "file_path");
			$modeldata['file_path'] = $fileInfo['filepath'];
		}
		
		//save ResourceItems record
		$record = ResourceItems::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("resourceitems/list_videos", "Record added successfully");
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function member_list(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.resourceitems.member_list";
		$query = ResourceItems::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ResourceItems::search($query, $search); // search table records
		}
		$query->join("resource_categories", "resource_items.category_id", "=", "resource_categories.id");
		$orderby = $request->orderby ?? "resource_items.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("published", "=" , "Yes");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->name){
			$val = $request->name;
			$query->where(DB::raw("resource_categories.name"), "=", $val);
		}
		if($request->file_type){
			$val = $request->file_type;
			$query->where(DB::raw("resource_items.file_type"), "=", $val);
		}
		$records = $query->paginate($limit, ResourceItems::memberListFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit_pdf(ResourceItemsedit_pdfRequest $request, $rec_id = null){
		$query = ResourceItems::query();
		$record = $query->findOrFail($rec_id, ResourceItems::editPdfFields());
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
		return $this->renderView("pages.resourceitems.edit_pdf", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit_video(ResourceItemsedit_videoRequest $request, $rec_id = null){
		$query = ResourceItems::query();
		$record = $query->findOrFail($rec_id, ResourceItems::editVideoFields());
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
		return $this->renderView("pages.resourceitems.edit_video", ["data" => $record, "rec_id" => $rec_id]);
	}
}
