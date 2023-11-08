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
    public function __construct()
    {
        $this->middleware("userIsAdmin")->except(["index", "show"]);
    }

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
        $this->authorize("admin");
        $categories = ProductCategory::all();
        return view("admin.product-create", compact(["categories"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize("admin");

        if (!$request->input("product_category_id")) {
            return redirect()->back()->with("failed", "Failed add new product, No Category selected");
        }
        if (!$request->hasFile("image")) {
            return redirect()->back()->with("failed", "Failed add new product, No image uploaded");
        }

        $image = $request->file('image'); // Ambil file gambar dari request
        $filename = time() . '.' . $image->getClientOriginalName(); // Buat nama file yang unik berdasarkan waktu dan ekstensi gambar
        $path = "public/product/img/"; // Tentukan path untuk menyimpan gambar di folder public/images

        $data = [
            ...$request->except("_token", "image"),
            "image" => "/" . $path . $filename,
            "seller_id" => auth()->user()->id,
        ];

        $image->move($path, $filename);
        Product::create($data);

        return redirect()->back()->with('success', 'Success add new product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        $feedbacks = ProductFeedback::where(["product_id" => $product->id])->orderBy('rating')->get();
        // Count comments which 'comment' field is not empty
        $comments = ProductFeedback::where(['product_id' => $product->id])->whereNotNull('comment')->count();
        return view("product-details", compact(["product", "feedbacks", "comments"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Check authorization
        $this->authorize("admin");

        // get all categories
        $categories = ProductCategory::all();
        
        return view("admin.product-edit", compact(["product", "categories"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        if ($request->hasFile("image")) {
            $data = $request->except("_token");
            $image = $request->file('image'); // Ambil file gambar dari request
            $filename = time() . '.' . $image->getClientOriginalName(); // Buat nama file yang unik berdasarkan waktu dan ekstensi gambar
            $path = "public/product/img/"; // Tentukan path untuk menyimpan gambar di folder public/images

            $data = [
                ...$request->except("_token", "image", "_method"),
                "image" => "/" . $path . $filename,
                "seller_id" => auth()->user()->id,
            ];

            $image->move($path, $filename);
            $product->update($data);
        } else {
            $product->update($request->except(["_token", "_method"]));
        }
        return redirect()->back()->with("success", "Success edit product");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $orders = $product->orders; 
        if ($orders){
            return $orders;
        }
        $product->delete();
        return redirect()->back()->with("success", "Success delete product");
    }
}
