<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobseekersController extends Controller
{
    public function landingpage() {
        return view('jobseekers/landingpage');
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
