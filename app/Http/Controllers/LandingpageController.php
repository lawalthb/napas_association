<?php

namespace App\Http\Controllers;

use App\Models\ContestantCandidate;
use App\Models\ContestantPosition;
use App\Models\ContestCategories;
use Illuminate\Http\Request;
use App\Models\WebColours;

class LandingpageController extends Controller
{

    public function LandingPage()
    {
        $colours = WebColours::all();

        return view('landingpage.index', compact('colours'));
    }


    public function contest(Request $request)
    {

        $categories = ContestCategories::OrderBy('name', 'asc')->get();
        if (!empty($request->id)) {

            $contestants = ContestCategories::where('category_id', $request->id)->get();
        } elseif (empty($request->id)) {
            $contestants = ContestCategories::orderBy('category_id')->get();
        }


        return view('landingpage.contest', compact('contestants', 'categories'));
    }

    public function thankyou()
    {

        return view('landingpage.thankyou');
    }
}
