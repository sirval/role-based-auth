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
Auth::routes();
Route::get('/home', [HomeController::class, 'index']);

