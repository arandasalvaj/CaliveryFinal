<?php

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

function contadorCart(){
    $user=Auth::user();
        
    if ($user = Auth::user()) {
       return $contador = Cart::where('user_id', $user->id)->count();
    }else{
        return $contador = 0;
    }
}

function precioEnvio(){

    $user=Auth::user();

    $Carts=Cart::where('user_id',$user->id)->get();
    $total=0;
    foreach ($Carts as $cart) {
        $products= Product::where('id',$cart->product_id)->get();
        $total=$cart->quantity+$total;
    }
    
    if ($total>2) {
        $total=$total;
        $total=$total/2;
        $total=round($total, 0, PHP_ROUND_HALF_DOWN);
        $total=$total*500;
        $total=$total+1500;
        return $total;
    }else{
        return $total=1500;
    }
}
function precioTotal(){

    $user=Auth::user();

    $Carts=Cart::where('user_id',$user->id)->get();
    $total=0;
    foreach ($Carts as $cart) {
        $products= Product::where('id',$cart->product_id)->get();
        $total=$cart->subtotal+$total;
    }
    return $total+precioEnvio();

}

function subTotal(){

    $user=Auth::user();

    $Carts=Cart::where('user_id',$user->id)->get();
    $total=0;
    foreach ($Carts as $cart) {
        $products= Product::where('id',$cart->product_id)->get();
        $total=$cart->subtotal+$total;
    }
    return $total;

}

function carrito(){
    $user=Auth::user();

    $Carts=Cart::where('user_id',$user->id)->get();
    foreach ($Carts as $cart) {
        $products= Product::where('id',$cart->product_id)->get();
    }
    return $Carts;
}
function vaciarCarro(){
    $carts=Cart::all();
    foreach($carts as $cart){
        Cart::destroy($cart->id);
    }
}