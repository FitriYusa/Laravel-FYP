<?php

namespace App\Http\Controllers;

use App\Models\Jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academy;
use App\Models\academyApply;
use App\Models\jobList;
use App\Models\Applicants;

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

        $jobseekers = Auth::user();

        $jobs = JobList::all(); // Fetch all jobs from the database

        return view('jobseekers/findjob',compact('jobseekers','jobs'));
    }

    public function profilepage() {
        return view('jobseekers/profile');
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
