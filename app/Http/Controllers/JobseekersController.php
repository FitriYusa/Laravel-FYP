<?php

namespace App\Http\Controllers;

use App\Models\Jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobseekersController extends Controller
{
    public function landingpage() {

        $jobseekers = Auth::user();
        return view('jobseekers/landingpage',compact('jobseekers'));
    }

    public function academypage(Request $request) {

        $jobseekers = Auth::user();
        $query = $request->input('query');
    
        // Start with the base query
        $academiesQuery = Academy::query();
    
        // If there's a search query, filter the academies based on it
        if ($query) {
            $academiesQuery->where('title', 'like', '%' . $query . '%');
        }
    
        // Now paginate the results
        $academies = $academiesQuery->simplePaginate(6);
    
        return view('jobseekers.academy', compact('jobseekers', 'academies', 'query'));
    }

    public function findjobpage() {
        return view('jobseekers/findjob');
    }

    public function profilepage() {
        return view('jobseekers/profile');
    }

}
