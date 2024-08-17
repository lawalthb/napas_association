<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElectionVotesAddRequest;
use App\Http\Requests\ElectionVotesEditRequest;
use App\Models\AcademicSessions;
use App\Models\ElectionAspirants;
use App\Models\ElectionPositions;
use App\Models\ElectionVotes;
use Illuminate\Http\Request;
use Exception;

class ElectionVotesController extends Controller
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
		$view = "pages.electionvotes.list";
		$query = ElectionVotes::query();
		$limit = $request->limit ?? 10;
		if ($request->search) {
			$search = trim($request->search);
			ElectionVotes::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "election_votes.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if ($fieldname) {
			$query->where($fieldname, $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ElectionVotes::listFields());
		return $this->renderView($view, compact("records"));
	}


	/**
	 * Select table record by ID
	 * @param string $rec_id
	 * @return \Illuminate\View\View
	 */
	function view($rec_id = null)
	{
		$query = ElectionVotes::query();
		$record = $query->findOrFail($rec_id, ElectionVotes::viewFields());
		return $this->renderView("pages.electionvotes.view", ["data" => $record]);
	}


	/**
	 * Display form page
	 * @return \Illuminate\View\View
	 */
	function add()
	{
		return $this->renderView("pages.electionvotes.add");
	}


	/**
	 * Save form record to the table
	 * @return \Illuminate\Http\Response
	 */
	function store(ElectionVotesAddRequest $request)
	{
		$modeldata = $this->normalizeFormData($request->validated());

		//save ElectionVotes record
		$record = ElectionVotes::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("electionvotes", "Record added successfully");
	}


	/**
	 * Update table record with form data
	 * @param string $rec_id //select record by table primary key
	 * @return \Illuminate\View\View;
	 */
	function edit(ElectionVotesEditRequest $request, $rec_id = null)
	{
		$query = ElectionVotes::query();
		$record = $query->findOrFail($rec_id, ElectionVotes::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("electionvotes", "Record updated successfully");
		}
		return $this->renderView("pages.electionvotes.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ElectionVotes::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}

	function member_list(Request $request)
	{

		$session_id = AcademicSessions::latest()->where('is_active', '=', 'Yes')->first();
		$current_academic_session_id = $session_id->id;
		$positions = ElectionPositions::where('academic_session_id', $current_academic_session_id)
			->whereHas('candidates', function ($query) {
				$query->where('payment_status', 'approved');
			})
			->with(['candidates' => function ($query) {
				$query->where('payment_status', 'approved');
			}])
			->get();
		//dd($positions);
		//return view('member.election.votes.index', compact('positions'));
		return $this->renderView("pages.electionvotes.member_list", ["positions" => $positions]);
	}

	public function vote(Request $request)
	{
		$ElectionVotes = new ElectionVotes();
		$ElectionVotes->user_id = Auth()->user()->id;
		$ElectionVotes->position_id = $request->position_id;
		$ElectionVotes->aspirant_id = $request->candidate_id;
		$ElectionVotes->ip_address = $request->ip();
		$ElectionVotes->save();


		$candidate_id = $request->candidate_id;
		$candidate = ElectionAspirants::findOrFail($candidate_id);
		$candidate->increment('votes');

		return response()->json($candidate);
	}
}
