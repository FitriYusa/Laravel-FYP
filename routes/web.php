<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobseekersController;
use App\Http\Controllers\CompanyController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

Route::get('/landing', [JobseekersController::class, 'landingpage']);
Route::get('/academy', [JobseekersController::class, 'academypage']);
Route::get('/findjob', [JobseekersController::class, 'findjobpage']);
Route::get('/profile', [JobseekersController::class, 'profilepage']);

Route::get('company/dashboard', [CompanyController::class, 'companydashboard']);
Route::get('company/profile', [CompanyController::class, 'companyprofile']);
Route::get('company/listing', [CompanyController::class, 'companylisting']);
Route::get('company/applicant', [CompanyController::class, 'companyapplicant']);

require __DIR__.'/auth.php';
