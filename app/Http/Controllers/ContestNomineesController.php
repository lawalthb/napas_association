<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContestNomineesAddRequest;
use App\Http\Requests\ContestNomineesEditRequest;
use App\Models\ContestNominees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class ContestNomineesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.contestnominees.list";
		$query = ContestNominees::query();
		$limit = $request->limit ?? 100;
		if($request->search){
			$search = trim($request->search);
			ContestNominees::search($query, $search); // search table records
		}
		$query->join("users", "contest_nominees.user_id", "=", "users.id");
		$query->join("contest_categories", "contest_nominees.category_id", "=", "contest_categories.id");
		$query->join("academic_sessions", "contest_nominees.academic_session", "=", "academic_sessions.id");
		$orderby = $request->orderby ?? "contest_nominees.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->category_id){
			$val = $request->category_id;
			$query->where(DB::raw("contest_nominees.category_id"), "=", $val);
		}
		if($request->academic_session){
			$val = $request->academic_session;
			$query->where(DB::raw("contest_nominees.academic_session"), "=", $val);
		}
		$records = $query->paginate($limit, ContestNominees::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ContestNominees::query();
		$query->join("users", "contest_nominees.user_id", "=", "users.id");
		$query->join("contest_categories", "contest_nominees.category_id", "=", "contest_categories.id");
		$query->join("academic_sessions", "contest_nominees.academic_session", "=", "academic_sessions.id");
		$record = $query->findOrFail($rec_id, ContestNominees::viewFields());
		return $this->renderView("pages.contestnominees.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.contestnominees.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ContestNomineesAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save ContestNominees record
		$record = ContestNominees::create($modeldata);
		$rec_id = $record->id;
		$this->afterAdd($record);
		return $this->redirect("contestnominees", "Record added successfully");
	}
    /**
     * After new record created
     * @param array $record // newly created record
     */
    private function afterAdd($record){
        //to create slug and update votelink
        $slug = \Illuminate\Support\Str::slug($record->name);
       $vote_link = url("vote/$slug"); 
       DB::table('contest_nominees')->where('id', $record->id)->update(['slug' => $slug, 
       'vote_link' => $vote_link
       ]);
    }
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ContestNomineesEditRequest $request, $rec_id = null){
		$query = ContestNominees::query();
		$record = $query->findOrFail($rec_id, ContestNominees::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("contestnominees", "Record updated successfully");
		}
		return $this->renderView("pages.contestnominees.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ContestNominees::query();
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
	function nominees_list(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.contestnominees.nominees_list";
		$query = ContestNominees::query();
		$limit = $request->limit ?? 100;
		if($request->search){
			$search = trim($request->search);
			ContestNominees::search($query, $search); // search table records
		}
		$query->join("contest_categories", "contest_nominees.category_id", "=", "contest_categories.id");
		$query->join("academic_sessions", "contest_nominees.academic_session", "=", "academic_sessions.id");
		$orderby = $request->orderby ?? "contest_nominees.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("academic_session", "=" , 1);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, ContestNominees::nomineesListFields());
		return $this->renderView($view, compact("records"));
	}
}
