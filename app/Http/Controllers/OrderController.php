<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**	id -	order_date -	status -	total_order -	shipping_cost - 	product_id -	user_id -	created_at -	updated_at
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * /**	id -	order_date -	status -	total_order -	shipping_cost  -	user_id -	created_at -	updated_at
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $date=Carbon::now();
        $order=new Order();

        $order->order_date=$date->toDateTimeString();////
        $order->status=1;////
        $order->total_order=$request->total;////
        $order->shipping_cost=1500;////
        $order->user_id=$user->id;
        $order->save();

        $idOrden=$order->id;

        $Carts=Cart::where('user_id',$user->id)->get();
        $total=0;
        
        foreach ($Carts as $cart) {
            $products= Product::where('id',$cart->product_id)->get();
            $total=$cart->subtotal+$total;
        }

        return view('orden.index',compact('products','Carts','total','user','idOrden'));

         
        //return view('orden.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}