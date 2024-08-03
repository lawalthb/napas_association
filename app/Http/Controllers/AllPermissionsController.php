<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllPermissionsAddRequest;
use App\Http\Requests\AllPermissionsEditRequest;
use App\Models\AllPermissions;
use Illuminate\Http\Request;
use Exception;
class AllPermissionsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.allpermissions.list";
		$query = AllPermissions::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			AllPermissions::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "all_permissions.permission_id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AllPermissions::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AllPermissions::query();
		$record = $query->findOrFail($rec_id, AllPermissions::viewFields());
		return $this->renderView("pages.allpermissions.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.allpermissions.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AllPermissionsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AllPermissions record
		$record = AllPermissions::create($modeldata);
		$rec_id = $record->permission_id;
		return $this->redirect("allpermissions", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AllPermissionsEditRequest $request, $rec_id = null){
		$query = AllPermissions::query();
		$record = $query->findOrFail($rec_id, AllPermissions::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("allpermissions", "Record updated successfully");
		}
		return $this->renderView("pages.allpermissions.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AllPermissions::query();
		$query->whereIn("permission_id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
