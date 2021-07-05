<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        foreach ($Carts as $cart) {
            $products= Product::where('id',$cart->product_id)->get();
        }

        return view('carro.index',compact('products','Carts'));
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
     */
    public function store(Request $request)
    {
        $user=Auth::user();

        $carts=Cart::where('product_id',$request->product_id)->where('user_id',$user->id)->get();

        $cartNew=new Cart();
        
        $products= Product::where('id',$request->product_id)->get();

        foreach ($products as $product) {
            $precio = $product->price; 
        } 
        
        $cantidad =$request->quantity;

        $valor = $precio* $cantidad;

        if ($carts->isEmpty()) {
    
            $carrito= new Cart();
            $carrito->quantity = $request->quantity;
            $carrito->subtotal = $valor;
            $carrito->product_id = $request->product_id;
            $carrito->user_id = $user->id;
            $carrito->save();

            return back();

        } else {

            foreach ($carts as $cart) {

                $cartNew=Cart::find($cart->id);
                $cartNew->quantity = $cart->quantity + $cantidad;
                $cartNew->subtotal = $cart->subtotal + $valor;
                $cartNew->product_id = $request->product_id;
                $cartNew->user_id = $user->id;
                $cartNew->save();
            } 
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('carro.index'); 
    }
    public function showCart()
    {
        return view('carro.index'); 
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
        $carts=Cart::find($id);
        $product=Product::find($carts->product_id);
        $carts->quantity=$request->quantity;
        $carts->subtotal= $product->price*$request->quantity;
        $carts->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return back();
    }

    public function destroyCart(Cart $cart)
    {
        
    }
}
