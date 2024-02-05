<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    
    public function companydashboard() {
        return view('company/dashboard');
    }

    public function companyprofile() {
        return view('company/profile');
    }

    public function companylisting() {
        return view('company/listing');
    }

    public function companyapplicant() {
        return view('company/applicant');
    }

}
