<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Staff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

  // Authentication Routes...
  Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
  Route::post('login', [LoginController::class, 'login']);
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
  
  // Registration Routes...
  Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
  Route::post('register', [RegisterController::class, 'register']);
  
  // Password Reset Routes...
  Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
  Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
  Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
  Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
  
  // Confirm Password
  Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
  Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
  
  // Email Verification Routes...
  Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
  Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify'); 
  Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


//admin middleware protected routes
Route::middleware(['admin', 'verified'])->group(function()
{
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin-home');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('/admin/home', [AdminController::class, 'store'])->name('store-staff');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::post('/admin/{id}/update', [AdminController::class, 'update'])->name('update');
    Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy']);
});

//staff middleware protected routes
Route::middleware([Staff::class])->group(function()
{
    Route::get('/staff/home', [StaffController::class, 'index'])->name('staff-home');
    Route::post('/staff/home', [StaffController::class, 'store'])->name('store');
});
// Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index']);

