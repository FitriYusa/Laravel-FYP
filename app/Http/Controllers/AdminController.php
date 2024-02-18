<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\Admin;
use App\Models\User;
use App\Models\jobList;
use App\Models\academyApply;
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

        $pendingApplicantsCount = academyApply::where('apply_status', 'pending')->count();

        return view('admin.index', compact('admins', 'jobseekers', 'companies', 'jobseekersCount', 'companiesCount','jobList','pendingApplicantsCount'));

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

    public function showAcademies()
    {
        $admins = Auth::user();
        $applies = AcademyApply::all();

        return view('admin.applicant', compact('admins','applies'));
    }

    public function updateStatus(Request $request, $id)
    {
        $admins = Auth::user();
        $apply = AcademyApply::findOrFail($id);
        $apply->update(['apply_status' => $request->status]);

        return redirect()->back()
        ->with('success', 'Status updated successfully.')
        ->with('admins', $admins);
    }

    public function Academies()
    {
        $admins = Auth::user();
        $applies = AcademyApply::all();

        return view('admin.applicant', compact('admins','applies'));
    }
}

 // // public function showNewBookings()
    // // {
    // //     $bookings = Academy::whereIn('academies_id', function ($query) {
    // //             $query->select('id')
    // //                 ->from('academies_list')
    // //                 ->where('admin_id', Auth::id()); // Ensure this matches your authenticated user's ID
    // //         })
    // //         ->whereIn('apply_status', ['pending', 'reject'])
    // //         ->with('company', 'user') // Ensure these relationships are defined in your Booking model
    // //         ->get();

    // //     return view('company.newbookings', compact('bookings'));
    // // }

    // // public function showBookings()
    // // {
    // //     $bookings = jobList::whereIn('job_id', function ($query) {
    // //             $query->select('id')
    // //                 ->from('properties')
    // //                 ->where('landlord_id', Auth::id()); // Ensure this matches your authenticated user's ID
    // //         })
    // //         ->where('apply_status', 'accept') // Add this line to filter by status
    // //         ->with('company', 'user') // Ensure these relationships are defined in your Booking model
    // //         ->get();

    // //     return view('company.bookings', compact('bookings'));
    // // }


    // public function handleBooking(Request $request, $bookingId)
    // {
    //     // Find the booking record
    //     $booking = jobList::findOrFail($bookingId);

    //     // Check if the landlord owns the property associated with this booking
    //     if ($booking->property->landlord_id !== Auth::id()) {
    //         return redirect()->route('landlordView.index')->with('error', 'Unauthorized action.');
    //     }

    //     // Handle different actions based on the request
    //     switch ($request->input('action')) {
    //         case 'accept':
    //             $booking->booking_status = 'accept';
    //             $message = 'Your booking has been accepted.';
    //             $message = 'Your booking for ' . $booking->property->title . ' on ' . $booking->in_date . '-' . $booking->out_date . ' has been accepted.';
    //             break;
    //         case 'reject':
    //             $booking->booking_status = 'cancel';
    //             $message = 'Your booking for ' . $booking->property->title . ' on ' . $booking->in_date . '-' . $booking->out_date . ' has been canceled.';
    //             break;
    //         case 'pending':
    //             $booking->booking_status = 'pending';
    //             $message = 'Your booking for ' . $booking->property->title . ' on ' . $booking->in_date . '-' . $booking->out_date . ' is pending.';
    //             break;
    //         case 'delete':
    //             $booking->delete();
    //             break;
    //         default:
    //             return redirect()->route('company.index')->with('error', 'Invalid action.');
    //     }

    //     $booking->save();
        
    //     // Notify the user about the booking status update
    //     if (isset($message)) {
    //         $booking->user->notify(new BookingNotification($booking, $message));
    //     }

    //     // return redirect()->route('landlordView.new.bookings')->with('success', 'Booking request updated.');
    //     return back()->with('success', 'Booking request updated.');
    // }