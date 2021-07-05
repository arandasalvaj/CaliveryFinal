<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $Carts=Cart::where('user_id',$user->id)->get();
        $total=0;
        
        foreach ($Carts as $cart) {
            $products= Product::where('id',$cart->product_id)->get();
            $total=$cart->subtotal+$total;
        }

        return view('orden.index',compact('products','Carts','total','user'));
        //return $user;
        //return view('orden.index');
        
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
     * ---\\(ITEM)//---  id- name -	quantity -	price -	detail -	img- 	color -	size -	product_id -	order_id -	created_at -	updated_at
     * 	---\\(CARRO DE COMPRAS)//---  id-     quantity-    subtotal -     product_id -     user_id -  created_at -     updated_at
     */
    public function store(Request $request, Order $order)
    {

        $user=Auth::user();
        $carro=Cart::where('user_id',$user->id)->get();
        $total=0;
        $carts=Cart::all();
        
        foreach($carts as $cart){
            $total=$cart->subtotal+$total;
            $item = new Item();
            $item->name=$cart->productos->name;
            $item->price=$cart->productos->price;
            $item->detail=$cart->productos->detail;
            $item->img=$cart->productos->img;
            $item->color=$cart->productos->color;
            $item->size=$cart->productos->size;
            $item->product_id=$cart->productos->id;
            $item->order_id=$request->idOrden;
            $item->quantity=$cart->quantity;
            $item->save();
        }

        $idOrden=$request->idOrden;
        return view('orden.resumen',compact('carts','total','user','idOrden'));
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
