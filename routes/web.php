<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\EntrepreneurUserController;
use App\Http\Controllers\WebsiteController;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AdminUserController::class,'login'])->name('admin_login');


Route::get('website',[WebsiteController::class,'website'])->name('website');

// admin routing
Route::get('/admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard')->middleware('auth');
Route::get('/admin_login',[AdminUserController::class,'login'])->name('admin_login')->middleware('guest');
Route::get('/admin_login_user',[AdminUserController::class,'login_user'])->name('admin_login_user');
Route::get('/admin_register',[AdminUserController::class,'register'])->name('admin_register')->middleware('guest');
Route::post('/admin_register_user',[AdminUserController::class,'register_user'])->name('admin_register_user');

Route::get('/logout',[AdminUserController::class,'logout'])->name('logout');

// entrepreneur routing
Route::get('/entrepreneur_dashboard',[EntrepreneurController::class,'index'])->name('entrepreneur_dashboard');
Route::get('/entrepreneur_login',[EntrepreneurUserController::class,'login'])->name('entrepreneur_login');
Route::get('/entrepreneur_login_user',[EntrepreneurUserController::class,'login_user'])->name('entrepreneur_login_user');
Route::get('/entrepreneur_register',[EntrepreneurUserController::class,'register'])->name('entrepreneur_register');
Route::post('/entrepreneur_register_user',[EntrepreneurUserController::class,'register_user'])->name('entrepreneur_register_user');

