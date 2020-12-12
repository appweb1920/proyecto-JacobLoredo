<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/listproductos','ProductoController@showListProduct');
Route::post('/listcategorias','CategoriaController@showListCategoria');
Route::post('/user','AuthController@user');
Route::post('/productosCategoria/{id}','AuthController@ProductosXCategoria');
Route::post('/carrito/{id_user}/{id_producto}','CarritoController@AgregarProductoCarrito');
Route::post('/carrito/{id_user}','CarritoController@ShowCarrito');
Route::post('/EliminarCarrito/{id_user}/{id_producto}','CarritoController@EliminarProductoCarrito');
Route::post('/Compra/{id_user}','CarritoController@ConfirmarCompra');
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});