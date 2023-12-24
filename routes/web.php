<?php

use App\Http\Controllers\AdminAddEntrepreneurUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\EntrepreneurUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\ShopBannerController;
use App\Http\Controllers\TimeSlotController;
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

Route::fallback(function()
{
    return view('error_page.error404');

});

Route::get('/',[AdminUserController::class,'login'])->name('admin_login');

Route::get('/home',[WebsiteController::class,'home'])->name('home');
Route::get('/event_post',[WebsiteController::class,'event'])->name('event_post');
Route::get('/contact',[WebsiteController::class,'contact'])->name('contact');
Route::get('/about_us',[WebsiteController::class,'about'])->name('about');
Route::get('editEvent/{id}', [WebsiteController::class, 'edit']);
Route::get('businessReNoEditEntrepreneur/{businessReNo}', [WebsiteController::class, 'edit1']);
Route::get('businessReNoProduction/{businessReNo}', [WebsiteController::class, 'edit2']);
Route::get('businessReNoTimeSlot/{businessReNo}', [WebsiteController::class, 'edit3']);
Route::get('businessReNoBanner/{businessReNo}', [WebsiteController::class, 'edit4']);

Route::get('/email',[EmailController::class,'index'])->name('email');
Route::get('/email_show', [EmailController::class, 'show'])->name('email_show');
Route::post('/email_store',[EmailController::class,'store'])->name('email_store');


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

// admin publish routing
Route::get('/publish', [PublishController::class, 'index'])->name('publish');
Route::get('/publish_show',[PublishController::class,'show'])->name('publish_show');
Route::get('/publish_edit', [PublishController::class, 'edit'])->name('publish_edit');
Route::post('/publish_update', [PublishController::class, 'update'])->name('publish_update');

// admin event routing
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::post('/event_store',[EventController::class,'store'])->name('event_store');
Route::get('/event_show', [EventController::class, 'show'])->name('event_show');
Route::get('event_edit', [EventController::class, 'edit'])->name('event_edit');
Route::post('/event_update', [EventController::class, 'update'])->name('event_update');
Route::delete('/event_delete', [EventController::class, 'delete'])->name('event_delete');

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

// entrepreneur shop_banner routing
Route::get('/shop_banner', [ShopBannerController::class, 'index'])->name('shop_banner');
Route::post('/shop_banner_store',[ShopBannerController::class,'store'])->name('shop_banner_store');
Route::get('/shop_banner_show', [ShopBannerController::class, 'show'])->name('shop_banner_show');
Route::get('shop_banner_edit', [ShopBannerController::class, 'edit'])->name('shop_banner_edit');
Route::post('/shop_banner_update', [ShopBannerController::class, 'update'])->name('shop_banner_update');
Route::delete('/shop_banner_delete', [ShopBannerController::class, 'delete'])->name('shop_banner_delete');
