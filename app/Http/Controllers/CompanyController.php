<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\Admin;
use App\Models\User;
use App\Models\jobList;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    
    public function companydashboard() {

        $companies = User::where('user_type', 'company')->get();

        return view('company.dashboard',compact('companies'));
    }

    public function companyprofile() {
        return view('company.profile');
    }

    public function companylisting() {
        return view('company/listing');
    }

    public function companyapplicant() {
        return view('company/applicant');
    }

    public function joblist(Request $request) {

         // Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view job listings.');
        }

        // Retrieve the company ID from the authenticated user's session
        $companyId = auth()->user()->id;

        // Retrieve the job list for the authenticated user's company
        $joblist = JobList::where('company_id', $companyId)->get();

        // Get the list of companies for any other functionality you might need
        $companies = User::where('user_type', 'company')->get();

        return view('company.joblist', compact('joblist', 'companies', 'companyId'));

        return view('company.joblist', compact('joblist', 'companies', 'companyId'));
    }

    public function message()
    {
        $admins = User::where('user_type', 'admin')->get();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        return view('admin.message', compact('admins','jobseekers','companies'));
    }

    public function deleteJob($JobId)
    {
        $job = jobList::findOrFail($JobId);
        
        // Delete the academy
        $job->delete();
        
        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Job ' . $job->title . ' has been deleted successfully.');
    }

    public function editJob($JobId)
    {
        // Find the academy by its ID
        $job = JobList::findOrFail($JobId);
    
        // Return the view for editing the academy
        return view('company.edit_job', compact('job'));
    }

    public function updateJob(Request $request, $JobId)
    {
        // Find the job by its ID
        $job = JobList::findOrFail($JobId);

        $startDate = $request->input('start_date');
        $startTime = $request->input('start_time');
        $endDate = $request->input('end_date');
        $endTime = $request->input('end_time');
    
        // Check if the end date or time is earlier than the start date or time
        if ($endDate < $startDate || ($endDate == $startDate && $endTime < $startTime)) {
            return redirect()->back()->with('warning', 'End date or time cannot be earlier than start date or time.')->withInput();
        }
        
        // Log the current values of the academy attributes
        error_log("Before update:");
        error_log(print_r($job->toArray(), true));
        
        // Update the academy attributes with the form data
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->location = $request->input('location');
        $job->type = $request->input('type');
        $job->start_date = $request->input('start_date');
        $job->end_date = $request->input('end_date');
        $job->start_time = $request->input('start_time');
        $job->end_time = $request->input('end_time');
        $job->is_active = $request->input('is_active');
        
         // Log the updated values of the academy attributes
        error_log("After update:");
        error_log(print_r($job->toArray(), true));

        // Save the changes to the academy
        $job->save();

        // Return the view for editing the academy with the success message
        return redirect()->route('company.joblist', $job->id)->with('success', 'Job updated successfully.');
        
    }

    public function createJob()
    {
        return view('company.create_job');
    }

    public function storeJob(Request $request)
    {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            // User is not authenticated, handle accordingly (e.g., redirect to login page)
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }

        // Retrieve the company ID from the authenticated user's session
        $companyId = auth()->user()->id;
        

        // Check if the end date or time is earlier than the start date or time
        // Validation for dates and times can be done using the date and time objects
        $startDate = new \DateTime($request->input('start_date') . ' ' . $request->input('start_time'));
        $endDate = new \DateTime($request->input('end_date') . ' ' . $request->input('end_time'));
    
        if ($endDate < $startDate) {
            return redirect()->back()->with('warning', 'End date or time cannot be earlier than start date or time.')->withInput();
        }
        
        // Validate the form data

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'salary' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_active' => 'required|boolean',
            //'image' => 'nullable|file|image|mimes:jpeg,png|max:2048',
        ]);

        // // if ($request->hasFile('image')) {
        // //     $image = $request->file('image');
        // //     $imageName = $image->getClientOriginalName();
        // //     $image->storeAs('public/images', $imageName); // Store the image in the storage
        // //     $validatedData['image'] = 'images/' . $imageName; // Save the file path in the database
        // // }
        // Add the company ID to the validated data
        $validatedData['company_id'] = $companyId;
        
    
        // Create a new job
        $job = jobList::create($validatedData);
    
        // Redirect back to the job list with a success message
        return redirect()->route('company.joblist', $job->id)->with(['success' => 'Job added successfully.', 'companyId' => $companyId]);

    }
    
    
}

