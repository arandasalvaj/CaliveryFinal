<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\role_user;
use App\Models\Store;
use App\Models\User;
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
        $user = Auth::user();
        $store = User::find($user->id)->store;
        $tienda = new Store();
        $tienda= Store::all();
        //$store = Store::paginate();
        //return view('tienda.index')->with('tiendas');
        
         return view('tienda.index')->with('tiendas',$tienda);
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
    //tienda.store
    public function store(Request $request)
    {
       /* $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cellphone' => 'required','max:11',
            'email' => 'required',
            'logo' => 'required',
        ]);*/

        $users = Auth::user();
        $store = new Store();
        $store -> name = $request->name;
        $store -> address = $request->address;
        $store -> cellphone = $request->cellphone;
        $store -> email =  $request->email;
        //$store -> logo = $request->logo;
        $store -> user_id = $users->id;
        
        $store->save();

        $rolU = role_user::where('user_id', '=', $users->id)->first();
        $rolU->role_id = 1;
        $rolU->save();
        return redirect()->route('tienda.index');
        //return view('tienda.index',compact('store'));
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
    public function edit(Store $tienda)
    {
        return view('tienda.edit')->with('tienda',Store::find($tienda));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $tienda)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cellphone' => 'required',
            'email' => 'required',
        ]);

        $tienda->update($request->all());
        //return redirect()->route('tienda.index');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Store::destroy($id);
        $users = Auth::user();
        $rolU = role_user::where('user_id', '=', $users->id)->first();
        $rolU->role_id = 2;
        $rolU->save();
        return redirect()->route('tienda.create');
    }

}
