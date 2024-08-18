<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SupervisorUsers;
use App\Models\WebAbouts;
use App\Models\WebExcos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends Controller
{
	/**
	 * Index Action
	 * @return \Illuminate\View\View
	 */
	function index()
	{
		$user = auth()->user();
		if ($user->hasRole('election_vote_page')) {
			return view("pages.home.election_vote_page");
		} elseif ($user->hasRole('Member')) {


			//to get president details
			$president  = WebExcos::where('post', 'President')->first() ?? 'No president found';
			//to get about details
			$about  = WebAbouts::where('id', 1)->first() ?? 'No about found';
			// allocated supervisor for memeber
			$supervisor = SupervisorUsers::with('supervisors')->where('user_id', $user->id)->first() ?? 'No supervisor found';


			return view("pages.home.user", compact('supervisor', 'president', 'about'));
		} else {
			return view("pages.home.index");
		}
	}
}
