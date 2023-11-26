<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntrepreneurController;

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
Route::get('/',[AdminController::class,'login'])->name('admin_login');

Route::get('/admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard');
Route::get('/admin_register',[AdminController::class,'register'])->name('admin_register');
Route::get('/admin_login',[AdminController::class,'login'])->name('admin_login');


Route::get('/entrepreneur_dashboard',[EntrepreneurController::class,'index'])->name('entrepreneur_dashboard');
Route::get('/entrepreneur_register',[EntrepreneurController::class,'register'])->name('entrepreneur_register');
Route::get('/entrepreneur_login',[EntrepreneurController::class,'login'])->name('entrepreneur_login');
