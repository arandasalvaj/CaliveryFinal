<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

function contadorCart(){
    
    $user=Auth::user();
        
    if ($user = Auth::user()) {
       return $contador = Cart::where('user_id', $user->id)->count();
    }else{
        return $contador = 0;
    }


    
}