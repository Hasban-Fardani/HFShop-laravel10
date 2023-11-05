<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
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
        // $c2 = $categories->products()->sync($products->pluck("id")->toArray());
        return view("admin.products", compact(["products", "categories"]));
    }
}
