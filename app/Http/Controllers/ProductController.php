<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = Auth::user();
        $tienda = User::find($user->id)->store;
        //$store = Store::paginate();
        //return view('tienda.index')->with('tiendas');
        //return view('tienda.index')->with('tiendas',$tienda);
         return view('tienda.index')->with('tiendas',$tienda);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        $store = Store::find($user->id);
        return view('producto.index',compact('store','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'detalle' => 'required',
            'tamano' => 'required',
        ]);
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
        $producto -> size =  $request->size;
        $producto -> status = 1;
        $producto -> img = $request -> img;
        $producto -> categoria_id = $request->category_id;
        $producto -> tienda_id = $innum;
        $producto->save();
        
        return redirect()->route('productos.index');
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
    public function edit(Product $productos)
    {
        return view('productos.edit',compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'detalle' => 'required',
            'tamano' => 'required',
            
        ]);
        
        $producto -> nombre = $request->nombre;
        $producto -> nombre = $request->nombre;
        $producto -> precio = $request->precio;
        $producto -> stock = $request->stock;
        $producto -> detalle = $request->detalle;
        $producto -> tamano =  $request->tamano;
        $producto->save();
        
        return redirect()->route('productos.index')->with('success','Producto editado satisfactoriamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success','Producto eliminado satisfactoriamente.');
    }
}
