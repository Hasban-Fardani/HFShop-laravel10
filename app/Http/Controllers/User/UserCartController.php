<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();
        if ($user->role == "admin"){
            return redirect("/admin");
        }

        $carts = Cart::with("product")->where("user_id", $user->id)->get();
        return view("user.cart", compact(["carts"]));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // todo : dont create new cart if product exist on cart [DONE]
        // return "hit";
        // idk why but admin can access this method, so i create this if
        if (auth()->user()->role == "admin"){
            return redirect("/admin")->with("error","admin cannot access user dashboard");
        }

        $data = $request->only(["product_id", "user_id", "quantity"]);
        $cart = Cart::where("product_id", $data["product_id"])->first();
        if (empty($cart)) {
            Cart::create($data);
        } else {
            $cart->quantity += $data["quantity"];
            $cart->save();
        }
        return redirect(route("user.cart.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
