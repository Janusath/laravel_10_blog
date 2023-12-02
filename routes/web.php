<?php

use App\Http\Controllers\AdminAddEntrepreneurUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\EntrepreneurUserController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\WebsiteController;
use App\Models\AdminAddEntrepreneurUser;



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

Route::fallback(function()
{
    return view('error_page.error404');

});

Route::get('/',[AdminUserController::class,'login'])->name('admin_login');


Route::get('website',[WebsiteController::class,'website'])->name('website');

// admin routing
Route::get('/admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard');
Route::get('/admin_login',[AdminUserController::class,'login'])->name('admin_login');
Route::get('/admin_login_user',[AdminUserController::class,'login_user'])->name('admin_login_user');
Route::get('/admin_register',[AdminUserController::class,'register'])->name('admin_register');
Route::post('/admin_register_user',[AdminUserController::class,'register_user'])->name('admin_register_user');
Route::get('/admin_profile',[AdminUserController::class,'admin_profile'])->name('admin_profile');
Route::get('/admin_logout',[AdminUserController::class,'logout'])->name('admin_logout');
Route::post('/admin_profile_update', [AdminUserController::class, 'admin_profile_update'])->name('admin_profile_update');

Route::get('/entrepreneur_logout',[EntrepreneurUserController::class,'logout'])->name('entrepreneur_logout');

// admin add entrepreneur user routing
Route::get('/admin_add_enterpreneur_user', [AdminAddEntrepreneurUserController::class, 'index'])->name('admin_add_enterpreneur_user');
Route::post('/admin_add_enterpreneur_user_store',[AdminAddEntrepreneurUserController::class,'store'])->name('admin_add_enterpreneur_user_store');
Route::get('/admin_add_enterpreneur_user_show', [AdminAddEntrepreneurUserController::class, 'show'])->name('admin_add_enterpreneur_user_show');
Route::get('/admin_add_enterpreneur_user_edit', [AdminAddEntrepreneurUserController::class, 'edit'])->name('admin_add_enterpreneur_user_edit');
Route::post('/admin_add_enterpreneur_user_update', [AdminAddEntrepreneurUserController::class, 'update'])->name('admin_add_enterpreneur_user_update');
Route::delete('/eadmin_add_enterpreneur_user_delete', [AdminAddEntrepreneurUserController::class, 'delete'])->name('admin_add_enterpreneur_user_delete');

// entrepreneur routing
Route::get('/entrepreneur_dashboard',[EntrepreneurController::class,'index'])->name('entrepreneur_dashboard');
Route::get('/entrepreneur_login',[EntrepreneurUserController::class,'login'])->name('entrepreneur_login');
Route::get('/entrepreneur_login_user',[EntrepreneurUserController::class,'login_user'])->name('entrepreneur_login_user');
Route::get('/entrepreneur_register',[EntrepreneurUserController::class,'register'])->name('entrepreneur_register');
Route::post('/entrepreneur_register_user',[EntrepreneurUserController::class,'register_user'])->name('entrepreneur_register_user');
Route::get('/entrepreneur_profile',[EntrepreneurUserController::class,'entrepreneur_profile'])->name('entrepreneur_profile');
Route::post('/entrepreneur_profile_update', [EntrepreneurUserController::class, 'entrepreneur_profile_update'])->name('entrepreneur_profile_update');

// entrepreneur production routing
Route::get('/production', [ProductionController::class, 'index'])->name('production');
Route::post('/production_store',[ProductionController::class,'store'])->name('production_store');
Route::get('/production_show', [ProductionController::class, 'show'])->name('production_show');
Route::get('/production_edit', [ProductionController::class, 'edit'])->name('production_edit');
Route::post('/production_update', [ProductionController::class, 'update'])->name('production_update');
Route::delete('/production_delete', [ProductionController::class, 'delete'])->name('production_delete');

// entrepreneur time_slot routing
Route::get('/time_slot', [TimeSlotController::class, 'index'])->name('time_slot');
Route::post('/time_slot_store',[TimeSlotController::class,'store'])->name('time_slot_store');
Route::get('/time_slot_show', [TimeSlotController::class, 'show'])->name('time_slot_show');
Route::get('time_slot_edit', [TimeSlotController::class, 'edit'])->name('time_slot_edit');
Route::post('/time_slot_update', [TimeSlotController::class, 'update'])->name('time_slot_update');
Route::delete('/time_slot_delete', [TimeSlotController::class, 'delete'])->name('time_slot_delete');
