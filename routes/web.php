<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobseekersController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 


// Jobseekers routes
Route::prefix('jobseekers')->group(function () {
    Route::get('/dashboard', [JobseekersController::class, 'landingpage'])->name('jobseekers.dashboard');
    Route::get('/academy', [JobseekersController::class, 'academypage']);
    Route::get('/findjob', [JobseekersController::class, 'findjobpage']);
    Route::get('/profile', [JobseekersController::class, 'profilepage']);
});

//Company routes
Route::prefix('company')->group(function () {
    //Dashboard
    Route::get('/dashboard', [CompanyController::class, 'companydashboard'])->name('company.dashboard');

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
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/company', [AdminController::class, 'company'])->name('admin.company');
    Route::get('/jobList', [AdminController::class, 'joblist'])->name('admin.joblist');

    Route::get('/academy', [AdminController::class, 'academy'])->name('admin.academy');
    Route::get('/message', [AdminController::class, 'message'])->name('admin.message');

    // Route for showing the edit form
    Route::match(['get', 'put'],'/academy/{AcademyId}/edit', [AdminController::class, 'editAcademy'])->name('academy.edit');

    // Route for handling the form submission to update the academy
    Route::put('/academy/{AcademyId}', [AdminController::class, 'updateAcademy'])->name('academy.update');

    Route::delete('/academies/{AcademyId}', [AdminController::class, 'deleteAcademy'])->name('academy.delete');

    Route::get('/academies/create', [AdminController::class, 'createAcademy'])->name('academy.create');

    Route::post('/academies', [AdminController::class, 'storeAcademy'])->name('academy.store');

});

//Route::match(['get', 'put'], '/academy/{AcademyId}/edit', [AdminController::class, 'editAcademy'])->name('academy.edit');

require __DIR__.'/auth.php';
