<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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

Auth::routes();

// pages
Route::get("/", function () {
    return view("index");
})->name("index");

Route::get("/about", function () {
    return view("about");
})->name("about");

Route::get("/contact", function () {
    return view("contact");
})->name("contact");
// end route pages

// product routes
Route::resource("/products", ProductController::class)->only(["index", "show"]);

// admin route group
Route::group(["prefix" => "/admin"], function () {
    Route::get("/", [AdminDashboardController::class, "index"])->name("admin.dashboard");

    // products
    Route::group(["prefix" => "/products"], function () {
        Route::get("/", [AdminProductsController::class, "index"])->name("admin.products.index");
        Route::get("/add", [ProductController::class, "create"])->name("admin.products.create");
        Route::post("/store", [ProductController::class, "store"])->name("admin.products.store");
        Route::get("/detail/{product}", [ProductController::class, "admin_show"])->name("admin.products.show");
        Route::get("/edit/{product}", [ProductController::class, "edit"])->name("admin.products.edit");
        Route::put("/edit/{product}", [ProductController::class, "update"])->name("admin.products.update");
        Route::delete("/delete/{product}", [ProductController::class, "destroy"])->name("admin.products.destroy");
    });
})->middleware(["auth", "userIsAdmin"]);

// user route group
Route::group(["prefix" => "/user"], function () {
    Route::get("/", [UserDashboardController::class, "index"])->name("user.dashboard");
    Route::get("/profile", [UserProfileController::class, "index"])->name("user.profile");
    Route::get("/cart", [CartController::class, "index"])->name("user.cart");
})->middleware("auth");

// User Dashboard group
// Route::group(["prefix" => "/dashboard"], function () {
// });

Route::group(["prefix"=> "/add"], function () {
    Route::post("/cart", [CartController::class, "store"])->name("add.cart");
});