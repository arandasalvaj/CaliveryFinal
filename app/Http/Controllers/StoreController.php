<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tienda = Store::paginate();
        return view('tienda.index',compact('tienda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tienda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cellphone' => 'required','max:11',
            'email' => 'required',
            'banner' => 'required',
            'logo' => 'required',
        ]);

        $user = Auth::user();
        $store = new Store();
        $store -> nombre = $request->name;
        $store -> direccion = $request->address;
        $store -> telefono = $request->cellphone;
        $store -> correo =  $user->email;
        $store -> user_id = $user->id;
        $store->save();
        
        return view('tienda.index',compact('store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $tienda)
    {
        return view('tienda.show',compact('tienda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $producto)
    {
        return view('tienda.edit',compact('tienda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $tienda)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'rubro' => 'required',
            'telefono' => 'required',
            'banner' => 'required',
            
        ]);

        $tienda->update($request->all());

        return redirect()->route('tienda.index')
            ->with('success','Producto actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $tienda)
    {
        $tienda->delete();

        return redirect()->route('tienda.index')
            ->with('success','Producto eliminado satisfactoriamente.');
    }
}
