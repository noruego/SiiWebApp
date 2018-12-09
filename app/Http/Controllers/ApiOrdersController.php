<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\User;
use App\OrderProduct;
use Illuminate\Support\Facades\DB;

class ApiOrdersController extends Controller
{
    public function index()
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->select('product_order.*')
            ->get();
        return $product_order;
    }

    public function store(Request $request)
    {
        $order= new Order();
        $order->order_date = $request->order_date;
        $order->id_customer = $request->id_customer;
        $order->subtotal = $request->subtotal;
        $order->total = $request->total;
        $order->id_ship = $request->id_ship;
        $order->description = $request->description;
        $order->id_discount_cupon = $request->id_discount_cupon;
        $order->id_payment_method = $request->id_payment_method;

        $order->save();
        $order2 = Order::find($order->id);
        return $order2->id;
    }
    public function show($id)
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->where('product_order.id_customer','=',$id)
            ->select('product_order.*')
            ->get();
            return $product_order;
    }

    public function add(Request $request)
    {
        $orderAdd = new OrderProduct();
        $orderAdd->id_product=$request->id_product;
        $orderAdd->id_product_order=$request->id_order;
        $orderAdd->save();
        return "ok";

    }
}
