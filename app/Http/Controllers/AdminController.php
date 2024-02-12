<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\Admin;
use App\Models\User;
use App\Models\jobList;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Auth::user();

        $jobseekers = User::where('user_type', 'jobseekers')->get();

        $companies = User::where('user_type', 'company')->get();

        $jobseekersCount = User::where('user_type', 'jobseekers')->count();

        $companiesCount = User::where('user_type', 'company')->count();

        $jobList = jobList::count(); 

        return view('admin.index', compact('admins', 'jobseekers', 'companies', 'jobseekersCount', 'companiesCount','jobList'));

    }

    public function company()
    {   
        $admins = Auth::user();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        return view('admin.company', compact('admins','jobseekers','companies'));
    }

    public function joblist()
    {   
        $admins = Auth::user();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();

        $jobList = jobList::get();
        
        return view('admin.joblist', compact('admins','jobseekers','companies','jobList'));
    }

    public function academy(Request $request)
    {
        $admins = Auth::user();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        $academies = Academy::get();
        //$academies = Academy::orderBy('is_active', 'asc')->get(); // Sorting by title in ascending order

        return view('admin.academy', compact('admins','jobseekers','companies','academies'));
    }

    public function message()
    {
        $admins = Auth::user();
        $jobseekers = User::where('user_type', 'jobseekers')->get();
        $companies = User::where('user_type', 'company')->get();
        return view('admin.message', compact('admins','jobseekers','companies'));
    }

   public function deleteAcademy($AcademyId)
    {
        $academy = Academy::findOrFail($AcademyId);
        
        // Delete the academy
        $academy->delete();
        
        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Academy ' . $academy->title . ' has been deleted successfully.');
    }

    public function editAcademy($AcademyId)
    {
        // Find the academy by its ID
        $academy = Academy::findOrFail($AcademyId);
    
        // Return the view for editing the academy
        return view('admin.edit_academy', compact('academy'));
    }

    public function updateAcademy(Request $request, $AcademyId)
    {
        // Find the academy by its ID
        $academy = Academy::findOrFail($AcademyId);

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
        error_log(print_r($academy->toArray(), true));
        
        // Update the academy attributes with the form data
        $academy->title = $request->input('title');
        $academy->description = $request->input('description');
        $academy->location = $request->input('location');
        $academy->type = $request->input('type');
        $academy->start_date = $request->input('start_date');
        $academy->end_date = $request->input('end_date');
        $academy->start_time = $request->input('start_time');
        $academy->end_time = $request->input('end_time');
        $academy->is_active = $request->input('is_active');
        
         // Log the updated values of the academy attributes
        error_log("After update:");
        error_log(print_r($academy->toArray(), true));

        // Save the changes to the academy
        $academy->save();

        // Return the view for editing the academy with the success message
        return redirect()->route('admin.academy', $academy->id)->with('success', 'Academy updated successfully.');
        
    }

    public function createAcademy()
    {
        return view('admin.create_academy');
    }
  
=======
    public function storeAcademy(Request $request )
    {
        $startDate = $request->input('start_date');
        $startTime = $request->input('start_time');
        $endDate = $request->input('end_date');
        $endTime = $request->input('end_time');
    
        // Check if the end date or time is earlier than the start date or time
        if ($endDate < $startDate || ($endDate == $startDate && $endTime < $startTime)) {
            return redirect()->back()->with('warning', 'End date or time cannot be earlier than start date or time.')->withInput();
        }
        
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
             'is_active' => 'required|boolean',
        //     //'image' => 'nullable|file|image|mimes:jpeg,png|max:2048',
        ]);


        // // if ($request->hasFile('image')) {
        // //     $image = $request->file('image');
        // //     $imageName = $image->getClientOriginalName();
        // //     $image->storeAs('public/images', $imageName); // Store the image in the storage
        // //     $validatedData['image'] = 'images/' . $imageName; // Save the file path in the database
        // // }
    
        
        // // Create a new academy
        $academy = Academy::create($validatedData);
    
        // // Redirect back to the academy list with a success message
        return redirect()->route('admin.academy',$academy)->with('success', 'Academy added successfully.');
    }
}



// public function storeAcademy(Request $request )
// {
//     $startDate = $request->input('start_date');
//     $startTime = $request->input('start_time');
//     $endDate = $request->input('end_date');
//     $endTime = $request->input('end_time');

//     // Check if the end date or time is earlier than the start date or time
//     if ($endDate < $startDate || ($endDate == $startDate && $endTime < $startTime)) {
//         return redirect()->back()->with('warning', 'End date or time cannot be earlier than start date or time.')->withInput();
//     }
    
//     // Validate the form data
//     $validator = Validator::make($request->all(), [
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'location' => 'required|string',
//         'type' => 'required|string',
//         'start_date' => 'required|date',
//         'end_date' => 'required|date|after_or_equal:start_date',
//         'start_time' => 'required|date_format:H:i',
//         'end_time' => 'required|date_format:H:i|after:start_time',
//         'is_active' => 'required|boolean',
//         // 'image' => 'nullable|file|image|mimes:jpeg,png|max:2048',
//     ]);
    
//     // Check if the validation fails
//     if ($validator->fails()) {
//         return redirect()->back()
//             ->withErrors($validator) // Pass validation errors to the view
//             ->withInput(); // Pass input data back to the form
//     }
    
//     // Retrieve the validated data
//     $validatedData = $validator->validated();
    
//     // Create a new academy
//     $academy = Academy::create($validatedData);
    
//     // Redirect back to the academy list with a success message
//     return redirect()->route('admin.academy', $academy)->with('success', 'Academy added successfully.');
// }







    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Admin $admin)
    // {
    //     //
    // }
