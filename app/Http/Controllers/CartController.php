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
        if ($user = Auth::user()) {
            $contador = Cart::where('user_id', $user->id)->count();
        }else{
            $contador = 0;
        }
        $user=Auth::user();

        $Carts=Cart::where('user_id',$user->id)->get();//2

        $cantidadC=0;

        foreach ($Carts as $cart) {
            $products= Product::where('id',$cart->product_id)->get();
            $cantidadC=$cantidadC+$cart->quantity;
        }

        /*
         $cantidadC=$cart->quantity;
        $total=0;

        foreach ($products as $product) {
            $cantidadC=$cantidadC*$product->price;
        }
        */
        return view('carro.index',compact('contador','products','cantidadC'));
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
        
        if ($user = Auth::user()) {
            $contador = Cart::where('user_id', $user->id)->count();
        }else{
            $contador = 0;
        }

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

            return back()->with('contador',$contador);

        } else {

            foreach ($carts as $cart) {

                $cartNew=Cart::find($cart->id);
                $cartNew->quantity = $cart->quantity + $cantidad;
                $cartNew->subtotal = $cart->subtotal + $valor;
                $cartNew->product_id = $request->product_id;
                $cartNew->user_id = $user->id;
                $cartNew->save();
            } 
            return back()->with('contador',$contador);
        }
        
        return $cartNew;
        //if ($pregunta===null) {
            /*
            $products= Product::where('id',$request->product_id)->get();

            foreach ($products as $product) {
                $precio = $product->price; 
            } 
            $cantidad =$request->quantity;
    
            $valor = $precio* $cantidad;
    
            $carrito= new Cart();
            $carrito->quantity = $request->quantity;
            $carrito->subtotal = $valor;
            $carrito->product_id = $request->product_id;
            $carrito->user_id = $user->id;
            $carrito->save();
            */
        //} else {

            //$carts= Cart::where('product_id',$request->product_id)->get(); 
            //$cartNew=new Cart();

            //    foreach ($carts as $cart) {
            //        $cartNew->quantity = $cart->quantity + $request->quantity;
            //        $cartNew->subtotal = $cart->subtotal + $request->subtotal;
             //       $cartNew->save();
             //   } 
        //}   

        




        

        //return back()->with('contador',$contador);
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
