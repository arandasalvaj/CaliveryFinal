<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = Auth::user();
       
        $categories = Category::all();

        $tiendas = Store::where('user_id', '=', $user->id)->get();

        foreach($tiendas as $tienda){
            $products = Product::where('store_id', '=', $tienda->id)->get();
        }
        
        $products = Product::all();
        return view('producto.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        $store = Store::find($user->id);
        return view('producto.create')->with('categories',$categories);
        //return view('producto.index',compact('store','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:12'],
            'price' => 'required',
            'stock' => 'required',
            'detail' => 'required',
        ]);

        /*
        'name' => ['required', 'string', 'max:12'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'lastname' => ['required', 'string', 'max:64'],
        'rut' => ['required', 'max:11'],
        */
        $user = Auth::user();
        $producto = new Product();
        $tiendas = Store::select('id')->where('user_id',$user->id)->get();
        foreach($tiendas as $tienda) {
            $innum=$tienda->id;
        }
        $producto -> name = $request->name;
        $producto -> price = $request->price;
        $producto -> stock = $request->stock;
        $producto -> detail = $request->detail;
        //$producto -> size =  $request->size;
        $producto -> status = 1;
        $producto -> img = $request -> img;
        $producto -> category_id = $request->category_id;
        $producto -> store_id = $innum;
        $producto->save();

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $producto)
    {
        return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $products= Product::find($id)->get();
        return view('producto.edit',compact('products','categories'));
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
        Product::destroy($id);

        return back();
    }
}
