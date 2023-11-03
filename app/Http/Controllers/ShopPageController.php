<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{
    //
    public function __invoke(){
        $products = Product::all();
        $productCategories = ProductCategory::all();
        return view("shop", compact(["products","productCategories"]));
    }
}
