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

    public function academypage() {

        $jobseekers = Auth::user();
        $academies = Academy::get();
        return view('jobseekers/academy',compact('jobseekers', 'academies'));
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
