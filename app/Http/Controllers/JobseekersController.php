<?php

namespace App\Http\Controllers;

use App\Models\Jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academy;
use App\Models\jobList;
use App\Models\Company;
use App\Models\User;
use App\Models\academyApply;
use App\Models\Applicants;

class JobseekersController extends Controller
{
    public function landingpage() {

        $jobseekers = Auth::user();
        return view('jobseekers.landingpage',compact('jobseekers'));
    }

    public function academypage(Request $request) {
        $jobseekers = Auth::user();
        $query = $request->input('query');
    
        // Start with the base query
        $academiesQuery = Academy::query();
    
        // If there's a search query, filter the academies based on it
        if ($query) {
            $academiesQuery->where(function ($subQuery) use ($query) {
                $subQuery->where('title', 'like', '%' . $query . '%')
                         ->orWhere('location', 'like', '%' . $query . '%')
                         ->orWhere('type', 'like', '%' . $query . '%');
            });
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

    public function findjobpage(Request $request) {
        $jobseekers = Auth::user();
        $query = $request->input('query');
    
        // Start with the base query
        $jobsQuery = jobList::query()->with('company');
    
        // If there's a search query, filter the jobs based on it
        if ($query) {
            $jobsQuery->where(function ($subQuery) use ($query) {
                $subQuery->where('title', 'like', '%' . $query . '%')
                         ->orWhere('location', 'like', '%' . $query . '%')
                         ->orWhere('type', 'like', '%' . $query . '%');
            });
        }
    
        // Now paginate the results
        $jobs = $jobsQuery->paginate(6);
    
        return view('jobseekers.findjob', compact('jobseekers', 'jobs', 'query'));
    }
    

    public function showJob($id){
        $jobseekers = Auth::user();
        $job = jobList::find($id); 

        return view('jobseekers.showjob', compact('job', 'jobseekers'));
    }

    public function profilepage() {

        $jobseekers = Auth::user();
        return view('jobseekers/profile',compact('jobseekers'));
    }

    public function applyAcademy(Request $request, $academyId)
    {
        // Find the academy
        $academy = Academy::findOrFail($academyId);
    
        // Check if the user has already applied
        if ($academy->isAppliedByUser(auth()->id())) {
            //return redirect()->back()->with('error', 'You have already applied for this academy.');
            return redirect()->back()->with('error', 'You have already applied for this academy.');
        }

        // Create a new academy application
        $application = new academyApply();
        $application->academy_id = $academyId;
        $application->user_id = auth()->id();
        $application->apply_status = 'pending'; // Set initial status
        $application->save();

        //dd(session()->all());
        // Redirect back with success message
        //return redirect()->back()->with('success', 'Academy application submitted successfully.');
        return redirect()->route('jobseekers.academy')->with('success', 'Academy application submitted successfully.');

    }

    public function isAppliedByUserAcademy($userId, $academyId)
    {
        return Academy::findOrFail($academyId)->applicants()->where('user_id', $userId)->exists();
    }   
    
    public function applyJob(Request $request, $jobId)
    {
        // Find the job
        $job = jobList::findOrFail($jobId);
        
        // Check if the user has already applied
        if ($job->isAppliedByUser(auth()->id())) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Create a new job application
        $application = new Applicants();
        $application->job_list_id = $jobId;
        $application->user_id = auth()->id();
        $application->apply_status = 'pending'; // Set initial status
        $application->save();   

        return redirect()->route('jobseekers.findjob')->with('success', 'Job application submitted successfully.');


    }
    
    public function isAppliedByUser($userId, $jobId)
    {
        return jobList::findOrFail($jobId)->applicants()->where('user_id', $userId)->exists();
    }

    public function appliedItems() {
        $user = auth()->user();
        
        // Retrieve applied academies with related data
        $appliedAcademies = $user->academyApplies()->with('academy')->get();
        
        // Retrieve applied jobs with related data
        $appliedJobs = $user->applicants()->with('job')->get();
    
        return view('jobseekers.applied', compact('appliedAcademies', 'appliedJobs'));
    }
    
    
}
