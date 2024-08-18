<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SupervisorUsers;
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

			// allocated supervisor for memeber
			$supervisor = SupervisorUsers::with('supervisors')->where('user_id', $user->id)->first() ?? 'No supervisor found';


			return view("pages.home.user", compact('supervisor'));
		} else {
			return view("pages.home.index");
		}
	}
}
