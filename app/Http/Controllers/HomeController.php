<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends Controller{
	/**
     * Index Action
     * @return \Illuminate\View\View
     */
	function index(){
		$user = auth()->user();
		if($user->hasRole('election_vote_page')){
			return view("pages.home.election_vote_page");
		}
		elseif($user->hasRole('my_topic')){
			return view("pages.home.my_topic");
		}
		else{
			return view("pages.home.index");
		}
	}
	
}
