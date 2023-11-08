<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ExpeditionPrice;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPromo;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    //
    public function create(Cart $cart)
    {
        $data = $cart;
        // $expeditions = Expedition::all();
        $expeditions_prices = ExpeditionPrice::all();
        $promos = ProductPromo::all();
        return view("user.order-create", compact(["data", "expeditions_prices", "promos"]));
    }
    public function create_fast(Request $request)
    {
        $data = $request->all();
        $expeditions_prices = ExpeditionPrice::all();

        $data["id"] = null;
        return view("user.order-create", compact(["data", "expeditions_prices"]));
    }

    public function store(Request $request)
    {
        $data = $request->except(["_token", "promo_code"]);
        // $data["seller_id"] = ;
        $product = Product::find($data["product_id"]);


        $promo_code = $request->input("promo_code");
        $promo = ProductPromo::where("code", $promo_code)->first();

        $cart_id = $data["cart_id"];
        
        $expedition_price = ExpeditionPrice::find($data["expedition_price_id"]);
        $data["total"] += $expedition_price->price;

        // delete cart because its have been ordered
        if ($cart_id){
            Cart::find($cart_id)->delete();
        }
        
        // delete cart_id from data
        unset($data["cart_id"]);

        // update product stok 
        $product = Product::find($data["product_id"]);
        $product->stok -= $data["quantity"];
        $product->save();

        if (!$promo) {
            $data["promo_id"] = null;
            Order::create($data);
            return redirect(route("user.cart.index"))->with("success", "success create order");
        }

        switch ($promo->discount_type) {
            case 'percen':
                $data["total"] = $data["quantity"] * $product->price * (1 - $promo->discount);
                break;

            case 'number':
                $data["total"] = $data["quantity"] * $product->price - $promo->discount;
                break;
        }
        
        Order::create($data);
        return redirect(route("user.cart.index"))->with("success", "success create order");
    }

    public function list(){
        $user = auth()->user();
        $orders = Order::where("user_id", $user->id)->get();
        return view("user.order-list", compact(["orders"]));
    }
}
