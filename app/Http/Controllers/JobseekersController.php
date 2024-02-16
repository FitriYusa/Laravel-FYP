<?php

namespace App\Http\Controllers;

use App\Models\Jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academy;
use App\Models\academyApply;
use App\Models\jobList;
use App\Models\Applicants;
use App\Models\jobList;
use App\Models\Company;
use App\Models\User;


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

    // public function applyJob(Request $request, $jobId)
    // {
    //     // Create a new job application
    //     $job = JobList::findOrFail($jobId);
    //     $job = new Applicants();
    //     $job->job_id = $jobId;
    //     $job->user_id = auth()->id();
    //     $job->status = 'pending'; // Set initial status
    //     $job->save();

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'Job application submitted successfully.');
    // }

    // public function isAppliedByUserJob($userId)
    // {
    //     return $this->applicants()->where('user_id', $userId)->exists();
    // }

    public function applyAcademy(Request $request, $academyId)
    {
        // Find the academy
        $academy = Academy::findOrFail($academyId);
    
        // Check if the user has already applied
        if ($academy->isAppliedByUser(auth()->id())) {
            return redirect()->back()->with('error', 'You have already applied for this academy.');
        }
    
        // Create a new academy application
        $application = new academyApply();
        $application->academy_id = $academyId;
        $application->user_id = auth()->id();
        $application->status = 'pending'; // Set initial status
        $application->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Academy application submitted successfully.');
    }
    
    // 3. Check if User has Applied
    public function isAppliedByUser($userId)
    {
        return $this->academyApplications()->where('user_id', $userId)->exists();
    }
}
