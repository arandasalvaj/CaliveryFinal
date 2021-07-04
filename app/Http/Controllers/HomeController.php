<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($user = Auth::user()) {
            $contador = Cart::where('user_id', $user->id)->count();
        }else{
            $contador = 0;
        }
        Auth::user();
        $products=Product::all();
        return view('home', compact('products','contador'));
        
    }
}
