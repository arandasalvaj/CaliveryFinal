<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        return redirect()->route('home');
        /*
        foreach (auth()->user() as $users ) {
            if ($users->tieneRol == 'Store') {
                return '/home';
            }
            if ($users->tieneRol == 'Seller') {
                return '/tienda/create';
            }
            if ($users->tieneRol == 'Customer') {
                return redirect()->route('home');
            }
            if ($users->tieneRol == 'Delivery') {
                return '/home';
            }   
            return '/';
        }
        return '/tienda/create';
        */
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
