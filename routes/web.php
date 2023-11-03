<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ShopPageController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/contact', function (){
    return view('contact');
})->name('contact');

Route::get('/shop', ShopPageController::class)->name('shop');

Auth::routes();

// product route group
Route::group(['prefix'=> '/product'], function () {
    
});

// admin route group
Route::group(['prefix'=> '/admin'], function () {
    Route::middleware("auth")->get("/", [AdminDashboardController::class, "index"])->name("admin.dashboard");
    // Route::get("/login", [AdminAuthController::class, "login"]);
})->middleware(["auth", "userIsAdmin"]);

// user route group
Route::group(["prefix"=> "/user"], function () {
    Route::get("/", [UserProfileController::class,"index"])->name("user.profile");
})->middleware("auth");

// User Dashboard group
Route::group(["prefix"=> "/dashboard"], function () {
    Route::get("/", [UserDashboardController::class,"index"])->name("");
});