<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PayController;
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

    Route::get("/profile", [AdminProfileController::class, "index"])->name("admin.profile")->middleware(["auth", "userIsAdmin"]);

    // products
    Route::group(["prefix" => "/products"], function () {
        Route::get("/", [AdminProductsController::class, "index"])->name("admin.products.index");
        Route::get("/add", [ProductController::class, "create"])->name("admin.products.create");
        Route::post("/store", [ProductController::class, "store"])->name("admin.products.store");
        Route::get("/details/{product}", [AdminProductsController::class, "show"])->name("admin.products.show");
        Route::get("/edit/{product}", [ProductController::class, "edit"])->name("admin.products.edit");
        Route::put("/edit/{product}", [ProductController::class, "update"])->name("admin.products.update");
        Route::delete("/delete/{product}", [ProductController::class, "destroy"])->name("admin.products.destroy");
    });

    // categories
    Route::group(["prefix" => "/categories"], function () {
        Route::get("/", [ProductCategoryController::class, "index"])->name("admin.categories.index");
        Route::get("/create", [ProductCategoryController::class, "create"])->name("admin.categories.create");
        Route::post("/store", [ProductCategoryController::class, "store"])->name("admin.categories.store");
        Route::get("/details/{productCategory}", [ProductCategoryController::class, "show"])->name("admin.categories.show");
        Route::get("/edit/{productCategory}", [ProductCategoryController::class, "edit"])->name("admin.categories.edit");
        Route::put("/update/{productCategory}", [ProductCategoryController::class, "edit"])->name("admin.categories.update");
        Route::delete("/delete/{productCategory}", [ProductCategoryController::class, "destroy"])->name("admin.categories.destroy");
    });

    // cart (see the customer who add to cart)
    Route::group(["prefix" => "/carts"], function () {
        Route::get("/", [UserCartController::class, "index"])->name("admin.cart.index");
        Route::get("/detail/{cart}", [UserCartController::class, "show"])->name("admin.cart.show");
    });

    // order (see customer order)
    Route::group(["prefix"=> "/orders"], function () {
        Route::get("/", [AdminOrderController::class, "index"])->name("admin.order.index");
        Route::get("/details/{order}", [AdminOrderController::class, "show"])->name("admin.order.details");
        Route::post("/accept", [AdminOrderController::class, "accept"])->name("admin.order.accept");
        Route::post("/decline", [AdminOrderController::class, "decline"])->name("admin.order.decline");;
    });

})->middleware(["auth", "userIsAdmin"]);

// user route group
Route::group(["prefix" => "/user"], function () {
    Route::get("/", [UserDashboardController::class, "index"])->name("user.dashboard");
    Route::get("/profile", [UserProfileController::class, "index"])->name("user.profile")->middleware("userIsNotAdmin");

    Route::group(["prefix" => "/carts"], function () {
        Route::get("/", [UserCartController::class, "index"])->name("user.cart.index");
        Route::get("/{cart}", [UserCartController::class, "show"])->name("user.cart.details");
        Route::get("/edit/{cart}", [UserCartController::class, "show"])->name("user.cart.edit");
        Route::post("/add", [UserCartController::class, "store"])->name("add.cart");
    });

    Route::prefix("/order")->group(function () {
        // create order from request data
        Route::get("/create", [UserOrderController::class, "create_fast"])->name("fast_order");

        // create order from cart
        Route::get("/create/{cart}", [UserOrderController::class, "create"])->name("order");

        // store order
        Route::post("/store", [UserOrderController::class, "store"])->name("order.store");

        // get all orders for user
        Route::get("/list", [UserOrderController::class, "list"])->name("user.order.list");
    });

    Route::get("/pay/{order}", [PayController::class, "create"])->name("pay.create");
    Route::post("/pay/{order}", [PayController::class, "pay"])->name("pay");

})->middleware(["auth", "userIsNotAdmin"]);


// Route::post("/pay/{}", [PayController::class, "pay"])->name("pay");