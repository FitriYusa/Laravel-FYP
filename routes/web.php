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
    // Route::get('/dashboard', [JobseekersController::class, 'landingpage'])->name('jobseekers.dashboard');
    Route::get('/academy', [JobseekersController::class, 'academypage'])->middleware(['auth','verified']);
    Route::get('/findjob', [JobseekersController::class, 'findjobpage'])->middleware(['auth','verified']);
    Route::get('/profile', [JobseekersController::class, 'profilepage'])->middleware(['auth','verified']);
 });

//Company routes
Route::prefix('company')->group(function () {
    Route::get('dashboard', [CompanyController::class, 'companydashboard'])->name('company.dashboard');
    Route::get('profile', [CompanyController::class, 'companyprofile']);
    Route::get('listing', [CompanyController::class, 'companylisting']);
    Route::get('applicant', [CompanyController::class, 'companyapplicant']);
});


//Admin route
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth','verified'])->name('admin.dashboard');
    Route::get('/company', [AdminController::class, 'company'])->middleware(['auth','verified'])->name('admin.company');
    Route::get('/academy', [AdminController::class, 'academy'])->middleware(['auth','verified'])->name('admin.academy');
    // Route::get('/message', [AdminController::class, 'message'])->name('admin.message');

});

require __DIR__.'/auth.php';
