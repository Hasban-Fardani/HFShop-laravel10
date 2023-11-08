<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct() {
        $this->middleware(["auth", "userIsAdmin"]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = ProductCategory::orderBy("created_at","desc")->get();
        return view("admin.categories", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.categories-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ProductCategory::create($request->except("_token"));
        return redirect()->back()->with("success","add new product category");
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
        return view("admin.categories-show", compact("productCategory"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        //
        return view("admin.categories-edit", compact("productCategory"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
        $productCategory->update($request->except("_token"));
        return redirect()->back()->with("success","success edit product category");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
        $productCategory->delete();
        return redirect()->back()->with("success","success delete product category");
    }
}
