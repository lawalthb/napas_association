<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\AcademicSession;
use App\Models\ContestantCandidate;
use App\Models\ContestantPosition;
use App\Models\ContestCategories;
use App\Models\ContestNominees;
use App\Models\ContestVote;
use App\Models\ContestVotes;
use App\Models\ElectionCandidate;
use App\Models\ElectionPosition;
use App\Models\ElectionVotes;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Users;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $ElectionVotes = new ElectionVotes();
        $ElectionVotes->user_id = Auth()->user()->id;
        $ElectionVotes->position_id = $request->position_id;
        $ElectionVotes->candidate_id = $request->candidate_id;
        $ElectionVotes->ip_address = $request->ip();
        $ElectionVotes->save();


        $candidate_id = $request->candidate_id;
        $candidate = ElectionCandidate::findOrFail($candidate_id);
        $candidate->increment('votes');

        return response()->json($candidate);
    }

    public function index(Request $request)
    {
        $session_id = AcademicSession::latest()->first();
        $current_academic_session_id = $session_id->id;
        $positions = ElectionPosition::has('candidates')->where('academic_session',  $current_academic_session_id)->with('candidates')->get();
        //dd($positions);
        return view('member.election.votes.index', compact('positions'));
    }

    public function ContestVote($slug)
    {
        $contestant = ContestNominees::where('slug', $slug)->firstOrFail();

        $category = ContestCategories::where('id', $contestant->category_id)->first();
        $nominees = Users::where('id', $contestant->user_id)->first();
        // dd($user);
        return view('landingpage.payment', ['contestant' => $contestant, 'category' => $category, 'nominees' => $nominees]);
    }

    public function ContestVotePayment($slug)
    {
        $contestant = ContestantCandidate::where('slug', $slug)->firstOrFail();
        // Redirect user to the payment page
        return view('payment', ['contestant' => $contestant->id]);
    }


    // ContestantController.php

    public function processPayment(Request $request)
    {

        //dd($request);
        $request->validate([
            'contestant_id' => 'required',
            'num_votes' => 'required|integer|min:1',
            'amount' => 'required',
            'email' => 'required',
        ]);

        $contestant = ContestNominees::findOrFail($request->contestant_id);
        $numVotes = $request->num_votes;
        $id = $request->id;

        //dd($ElectionPosition);

        $ContestVote = new ContestVotes();
        $ContestVote->email = $request->email;
        $ContestVote->category_id = $contestant->category_id;
        $ContestVote->candidate_id  = $request->contestant_id;
        $ContestVote->vote_number = $request->num_votes;
        $ContestVote->amount = $request->amount;
        $ContestVote->payment_status = "pending";
        $ContestVote->save();
        $lastInsertedId = $ContestVote->id;
        $callback_url = route('payment_callback');

        //connect to payment gateway
        $data = makePayment(
            $request->amount,
            $request->email,
            $callback_url
        );



        if (auth()->check()) {
            $user_id = Auth()->user()->id;
        } else {
            $user_id = 1;
        }


        Transactions::create([
            'user_id' => $user_id,
            'purpose' => 'contest fee',
            'purpose_id' => $lastInsertedId,
            'email' =>  $request->email,
            'amount' => $request->amount,
            'fullname' =>  'Anonymous',
            'phone_number' =>  '08132712715',
            'callback_url' => $callback_url,
            'reference' => $data['orderReference'],
            'authorization_url' => $data['checkoutLink'],
            'purpose_name' => 'contest',
        ]);
        $payment_link = $data['checkoutLink'];
        return redirect($data['checkoutLink']);
    }
}
