<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobseekersController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
use App\Models\Company;
use App\Models\Jobseekers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('jobseekers.landingpage');
    //Route::get('/', [AdminController::class, 'index']);

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// }); 

Route::get('/', function () {
    return view('jobseekers.landingpage');
});


Route::get('/jobseekeracademy', [JobseekersController::class, 'academypage'])->name('jobseekers.academy');
Route::get('/jobseekeracademy/{id}', [JobseekersController::class, 'showAcademy'])->name('jobseekers.showacademy');
Route::get('/findjob', [JobseekersController::class, 'findjobpage'])->name('jobseekers.findjob');

Route::post('/apply-job/{jobId}', [JobseekersController::class, 'apply'])->name('apply.job');


// Jobseekers routes
Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', [JobseekersController::class, 'landingpage'])->name('jobseekers.dashboard');

    //academy
    

    //Job
    

    //Profile
    Route::get('/profile', [JobseekersController::class, 'profilepage'])->name('jobseekers.profile');;
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Company routes
Route::middleware(['auth', 'company'])->group(function () {
    //Dashboard
    Route::get('/dash', [CompanyController::class, 'companydashboard'])->name('company.dashboard');

    //Profile
    Route::get('/profile', [CompanyController::class, 'companyprofile'])->name('company.profile');
    
    //Job List
    Route::get('/joblist', [CompanyController::class, 'joblist'])->name('company.joblist');
    Route::match(['get', 'put'],'/job/{JobId}/edit', [CompanyController::class, 'editJob'])->name('job.edit');
    Route::put('/job/{JobId}', [CompanyController::class, 'updateJob'])->name('job.update');
    Route::delete('/job/{JobId}', [CompanyController::class, 'deleteJob'])->name('job.delete');
    Route::get('/job/create', [CompanyController::class, 'createJob'])->name('job.create');
    Route::post('/job', [CompanyController::class, 'storeJob'])->name('job.store');

    //Applicants
    Route::get('/applicant', [CompanyController::class, 'companyapplicant']);

    
});

//Admin route
Route::middleware(['auth', 'admin'])->group(function () {
    //Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //Company
    Route::get('/company', [AdminController::class, 'company'])->name('admin.company');

    //Job list
    Route::get('/jobList', [AdminController::class, 'joblist'])->name('admin.joblist');

    //Academy
    Route::get('/academy', [AdminController::class, 'academy'])->name('admin.academy');
    Route::match(['get', 'put'],'/academy/{AcademyId}/edit', [AdminController::class, 'editAcademy'])->name('academy.edit');
    Route::put('/academy/{AcademyId}', [AdminController::class, 'updateAcademy'])->name('academy.update');
    Route::delete('/academies/{AcademyId}', [AdminController::class, 'deleteAcademy'])->name('academy.delete');
    Route::get('/academies/create', [AdminController::class, 'createAcademy'])->name('academy.create');
    Route::post('/academies', [AdminController::class, 'storeAcademy'])->name('academy.store');

    //Message
    Route::get('/message', [AdminController::class, 'message'])->name('admin.message');

   

});

//Route::match(['get', 'put'], '/academy/{AcademyId}/edit', [AdminController::class, 'editAcademy'])->name('academy.edit');

require __DIR__.'/auth.php';
