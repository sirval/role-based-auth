<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

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

//admin middleware protected routes
Route::middleware([Admin::class])->group(function()
{
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin-home');
    Route::post('/admin/home', [AdminController::class, 'store'])->name('store-staff');
});

//staff middleware protected routes
Route::middleware([Staff::class])->group(function()
{
    Route::get('/staff/home', [StaffController::class, 'index'])->name('staff-home');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index']);

