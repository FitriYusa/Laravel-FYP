<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\jobList;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('user_type', 'admin')->get();

        $jobseekers = User::where('user_type', 'jobseekers')->get();

        $companies = User::where('user_type', 'company')->get();

        $jobseekersCount = User::where('user_type', 'jobseekers')->count();

        $companiesCount = User::where('user_type', 'company')->count();

        $jobList = jobList::count(); 

        return view('admin.index', compact('admins', 'jobseekers', 'companies', 'jobseekersCount', 'companiesCount','jobList'));

    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function company()
    {   
        $admins = User::where('user_type', 'admin')->get();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        return view('admin.company', compact('admins','jobseekers','companies'));
    }

    public function academy()
    {
        $admins = User::where('user_type', 'admin')->get();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        return view('admin.academy', compact('admins','jobseekers','companies'));
    }

    public function message()
    {
        $admins = User::where('user_type', 'admin')->get();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        return view('admin.message', compact('admins','jobseekers','companies'));
    }

}
