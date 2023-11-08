<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function index(){
        $user = auth()->user();
        $orders = Order::where("seller_id", $user->id)->get();
        return view("admin.order-list", compact("orders"));
    }

    public function show(Order $order){
        return view("admin.order-detail", compact("order"));
    }

    public function accept(Request $request){
        $order = Order::find($request->input("order_id"));
        // dd($order);
        $order->status = 'dikemas';
        $order->save();

        return redirect()->back()->with('success', 'Order accepted!');
    }

    public function decline(){
        $order = Order::find(request('order_id'));
        // dd($order);
        $order->status = 'ditolak';
        $order->save();

        return redirect()->back()->with('success', 'Order declined!');
    }
}
