<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;

class UserCreateProductFeedbackController extends Controller
{
    //
    public function store(Request $request, string $product_id){
        $data = $request->only(["rating", "comment"]);
        
        $product = Product::find($product_id);
        $data["product_id"] =  $product->id;
        
        $user = auth()->user();
        $data["user_id"] = $user->id;

        ProductFeedback::create($data);
        return redirect()->back()->with("success","success create feedback");
    }

    public function update(Request $request, ProductFeedback $product_feedback){
        $data = $request->only(["rating", "comment"]);
        // dd($product_feedback);
        $product_feedback->update($data);
        return redirect()->back()->with("success","success update feedback");
    }
}
