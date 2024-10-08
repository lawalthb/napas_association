<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorUsersAddRequest;
use App\Http\Requests\SupervisorUsersEditRequest;
use App\Models\SupervisorUsers;
use Illuminate\Http\Request;
use Exception;

class SupervisorUsersController extends Controller
{


	/**
	 * List table records
	 * @param  \Illuminate\Http\Request
	 * @param string $fieldname //filter records by a table field
	 * @param string $fieldvalue //filter value
	 * @return \Illuminate\View\View
	 */
	function index(Request $request, $fieldname = null, $fieldvalue = null)
	{
		$view = "pages.supervisorusers.list";
		$query = SupervisorUsers::query();
		$limit = $request->limit ?? 500;
		if ($request->search) {
			$search = trim($request->search);
			SupervisorUsers::search($query, $search); // search table records
		}
		$query->join("users", "supervisor_users.user_id", "=", "users.id");
		$query->join("project_supervisors", "supervisor_users.supervisor_id", "=", "project_supervisors.id");
		$orderby = $request->orderby ?? "supervisor_users.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if ($fieldname) {
			$query->where($fieldname, $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, SupervisorUsers::listFields());
		return $this->renderView($view, compact("records"));
	}


	/**
	 * Select table record by ID
	 * @param string $rec_id
	 * @return \Illuminate\View\View
	 */
	function view($rec_id = null)
	{
		$query = SupervisorUsers::query();
		$record = $query->findOrFail($rec_id, SupervisorUsers::viewFields());
		return $this->renderView("pages.supervisorusers.view", ["data" => $record]);
	}


	/**
	 * Display form page
	 * @return \Illuminate\View\View
	 */
	function add()
	{
		return $this->renderView("pages.supervisorusers.add");
	}


	/**
	 * Save form record to the table
	 * @return \Illuminate\Http\Response
	 */
	function store(SupervisorUsersAddRequest $request)
	{
		$modeldata = $this->normalizeFormData($request->validated());

		//save SupervisorUsers record
		$record = SupervisorUsers::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("supervisorusers", "Record added successfully");
	}


	/**
	 * Update table record with form data
	 * @param string $rec_id //select record by table primary key
	 * @return \Illuminate\View\View;
	 */
	function edit(SupervisorUsersEditRequest $request, $rec_id = null)
	{
		$query = SupervisorUsers::query();
		$record = $query->findOrFail($rec_id, SupervisorUsers::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("supervisorusers", "Record updated successfully");
		}
		return $this->renderView("pages.supervisorusers.edit", ["data" => $record, "rec_id" => $rec_id]);
	}


	/**
	 * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma
	 * @return \Illuminate\Http\Response
	 */
	function delete(Request $request, $rec_id = null)
	{
		$arr_id = explode(",", $rec_id);
		$query = SupervisorUsers::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
