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

    public function academypage() {
        return view('jobseekers/academy');
    }

    public function findjobpage() {
        return view('jobseekers/findjob');
    }

    public function profilepage() {
        return view('jobseekers/profile');
    }

}
