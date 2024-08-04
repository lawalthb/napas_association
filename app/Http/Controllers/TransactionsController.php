<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionsAddRequest;
use App\Http\Requests\TransactionsEditRequest;
use App\Models\Transactions;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsMemberViewExport;
use Illuminate\Support\Facades\DB;
use Exception;
class TransactionsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.transactions.list";
		$query = Transactions::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Transactions::search($query, $search); // search table records
		}
		$query->join("price_settings", "transactions.price_settings_id", "=", "price_settings.id");
		$orderby = $request->orderby ?? "transactions.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		if($request->price_settings_id){
			$val = $request->price_settings_id;
			$query->where(DB::raw("transactions.price_settings_id"), "=", $val);
		}
		$records = $query->paginate($limit, Transactions::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Transactions::query();
		$query->join("price_settings", "transactions.price_settings_id", "=", "price_settings.id");
		$record = $query->findOrFail($rec_id, Transactions::viewFields());
		return $this->renderView("pages.transactions.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.transactions.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(TransactionsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Transactions record
		$record = Transactions::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("transactions", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(TransactionsEditRequest $request, $rec_id = null){
		$query = Transactions::query();
		$record = $query->findOrFail($rec_id, Transactions::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("transactions", "Record updated successfully");
		}
		return $this->renderView("pages.transactions.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Transactions::query();
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
	function member_list(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.transactions.member_list";
		$query = Transactions::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Transactions::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "transactions.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("user_id", "=" , auth()->user()->id);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Transactions::memberListFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function member_view($rec_id = null){
		$query = Transactions::query();
		$query->join("users", "transactions.user_id", "=", "users.id");
		$query->join("price_settings", "transactions.price_settings_id", "=", "price_settings.id");
		// if request format is for export example:- product/view/344?export=pdf
		if($this->getExportFormat()){
			return $this->ExportMemberView($query, $rec_id);
		}
		$record = $query->findOrFail($rec_id, Transactions::memberViewFields());
		return $this->renderView("pages.transactions.member_view", ["data" => $record]);
	}
	

	/**
     * Export single record to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $record
	 * @param string $rec_id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportMemberView($query, $rec_id){
		ob_end_clean();// clean any output to allow file download
		$filename ="MemberViewTransactionsReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$record = $query->findOrFail($rec_id, Transactions::exportMemberViewFields());
			return view("reports.transactions-member_view", ["record" => $record]);
		}
		elseif($format == "pdf"){
			$record = $query->findOrFail($rec_id, Transactions::exportMemberViewFields());
			$pdf = PDF::loadView("reports.transactions-member_view", ["record" => $record]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new TransactionsMemberViewExport($query, $rec_id), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new TransactionsMemberViewExport($query, $rec_id), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
