<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryGroup;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paginate_count = 12;
        $products = Product::paginate($paginate_count);
        $product_count = count(Product::all());
        $pages = ceil($product_count / $paginate_count);
        $product_categories = ProductCategory::all();
        $product_category_groups = ProductCategoryGroup::all();
        return view("product", compact(["products", "pages", "product_count", "product_categories", "product_category_groups"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        $feedbacks = ProductFeedback::where("product_id", $product->id)->orderBy('rating')->get();
        $comments = 0;  // todo : count comments
        return view("product-details", compact(["product", "feedbacks", "comments"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $this->middleware("userIsAdmin");
        return view();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
