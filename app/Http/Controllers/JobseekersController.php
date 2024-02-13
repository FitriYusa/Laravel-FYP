<?php

namespace App\Http\Controllers;

use App\Models\Jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academy;

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
        $academies = $academiesQuery->paginate(6);
    
        return view('jobseekers.academy', compact('jobseekers', 'academies', 'query'));
    }

    public function showAcademy($id){

        $jobseekers = Auth::user();
        $academy = Academy::find($id); 

        return view('jobseekers.showacademy', compact('academy', 'jobseekers'));
    }

    public function findjobpage() {

        $jobseekers = Auth::user();
        return view('jobseekers/findjob',compact('jobseekers'));
    }

    public function profilepage() {

        $jobseekers = Auth::user();
        return view('jobseekers/profile',compact('jobseekers'));
    }

}
