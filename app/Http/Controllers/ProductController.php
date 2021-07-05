<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $categories = Category::all();
        $store = Store::where('user_id', $user->id)->get();
        foreach($store as $tienda){$products = Product::where('store_id', $tienda->id)->get();}
        $products = Product::all();
        //return view('producto.index',compact('products','categories', 'store'));
        return view('producto.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('producto.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'price' => 'required',
            'stock' => 'required',
            'detail' => 'required',
            'img' => ['required', 'image', 'max:1024'],
        ]);
        $imagen=$request -> img->store('public/imagenes');

        $url= Storage::url($imagen);

        $user = Auth::user();

        $producto = new Product();
        $idTienda = Store::select('id')->where('user_id',$user->id)->first();
        $producto -> name = $request->name;
        $producto -> price = $request->price;
        $producto -> stock = $request->stock;
        $producto -> detail = $request->detail;
        $producto -> status = 1;
        $producto -> img = $url;
        $producto -> category_id = $request->category_id;
        $producto -> store_id = $idTienda->id;
        $producto->save();

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $producto)
    {
        redirect()->route('producto.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $categories = Category::all();
        //$product = Product::find($id);
        //return view('producto.edit',compact('product','categories'));
        //return redirect()->route('producto.show');
        return view('producto.edit',compact('categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'detail' => 'required',
            
        ]);
        
        $producto->update($request->all());
        //return redirect()->route('tienda.index');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carts=Cart::all();
        foreach($carts as $cart){
            Product::destroy($cart->id);
        }
        return back();
    }
}
