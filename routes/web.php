<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::resource('/cart',ShoppingcartController::class);
Auth::routes();

Route::get('/', function () {
    return view('home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\StoreController::class, 'dashboard'])->name('dashboard');
Route::get('/registro-repartidor', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationFormD'])->name('registerD');
Route::get('/registro-vendedor', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationFormS'])->name('registerS');
Route::post('/registro-vendedor', [App\Http\Controllers\Auth\RegisterController::class, 'registerSeller'])->name('registerS');
Route::post('/registro-repartidor', [App\Http\Controllers\Auth\RegisterController::class, 'registerDelivery'])->name('registerD');
Route::resource('/tienda',StoreController::class);
Route::resource('/categorias',CategoryController::class);
Route::resource('/cart',CartController::class)->middleware('can:Customer');
Route::get('/cart-vacio', [App\Http\Controllers\CartController::class, 'destroyCart'])->middleware('can:Customer')->name('destroyCart');
Route::get('/cart-detalle', [App\Http\Controllers\CartController::class, 'showCart'])->middleware('can:Customer')->name('showcart');
Route::resource('/producto',ProductController::class);
Route::resource('/item',ItemController::class);
Route::resource('/orden',OrderController::class);
Route::get('/terminado', [App\Http\Controllers\OrderController::class, 'completado'])->middleware('can:Customer')->name('ordenTerminada');

Route::get('/ordenes', [App\Http\Controllers\OrderController::class, 'ordenesCliente'])->name('ordenesCliente');
Route::get('/ordenDetalle/{order}', [App\Http\Controllers\OrderController::class, 'detalleOrdenC'])->name('detalleOrden');

