<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContestVotesAddRequest;
use App\Http\Requests\ContestVotesEditRequest;
use App\Models\ContestVotes;
use Illuminate\Http\Request;
use Exception;
class ContestVotesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.contestvotes.list";
		$query = ContestVotes::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			ContestVotes::search($query, $search); // search table records
		}
		$query->join("users", "contest_votes.candidate_id", "=", "users.id");
		$orderby = $request->orderby ?? "contest_votes.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ContestVotes::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ContestVotes::query();
		$record = $query->findOrFail($rec_id, ContestVotes::viewFields());
		return $this->renderView("pages.contestvotes.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.contestvotes.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ContestVotesAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save ContestVotes record
		$record = ContestVotes::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("contestvotes", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ContestVotesEditRequest $request, $rec_id = null){
		$query = ContestVotes::query();
		$record = $query->findOrFail($rec_id, ContestVotes::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("contestvotes", "Record updated successfully");
		}
		return $this->renderView("pages.contestvotes.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ContestVotes::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
