<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PayController extends Controller
{
    //
    public function create(Order $order, Request $request)
    {
        return view("user.pay", compact("order"));
    }
    public function pay(Order $order, Request $request)
    {
        $order->update(["status" => 'menunggu pembayaran dikonfirmasi', "paid"=>$request->input("amount")]);
        return redirect(route('user.order.list'))->with("success","payoff success");
    }
}
