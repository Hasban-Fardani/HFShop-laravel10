<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    //
    public function __construct() {
        $this->middleware("auth");
        $this->middleware("userIsAdmin");
    }

    public function index(){
        $products = Product::all();
        $categories = ProductCategory::all();
        return view("admin.product-list", compact(["products", "categories"]));
    }

    public function show(Product $product){
        //
        $feedbacks = ProductFeedback::where(["product_id" => $product->id])->orderBy('rating')->get();
        $comments = 0; // todo : count comments
        $user = auth()->user();
        return view("admin.product-detail", compact(["product", "feedbacks", "comments", "user"]));
    }
}
