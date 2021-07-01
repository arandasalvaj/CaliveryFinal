<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        
        $productos = Product::latest()->paginate(5);

        return view('productos.index',compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'detalle' => 'required',
            'tamano' => 'required',
        ]);

        $user = Auth::user();
        $producto = new Product();
        $tiendas = Store::select('id')->where('user_id',$user->id)->get();
        foreach($tiendas as $tienda) {
            $innum=$tienda->id;
        }
        $producto -> nombre = $request->nombre;
        $producto -> precio = $request->precio;
        $producto -> stock = $request->stock;
        $producto -> detalle = $request->detalle;
        $producto -> tamano =  $request->tamano;
        $producto -> estado = 1;
        $producto -> img = $request -> img;
        $producto -> categoria_id = $request->categoriaid;
        $producto -> tienda_id = $innum;
        $producto->save();
        
        return redirect()->route('productos.create')>with('success','Producto creada satisfactoriamente.');
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
