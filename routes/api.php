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
/**
 * Ruta Api para ingresar a las funciones del usuario
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * Rutas del usuario 
 * Login
 * Registrarse
 * Terminar sesion
 * Mostrar usuario
 */
Route::post('/user','AuthController@user');
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
/**
 * Ruta para listar todos los productos.
 * Ruta para mostrar las categorias
 * Ruta para Mostrar los productos de una categoria
 * Ruta para agregar un producto al carrito
 * Ruta para mostrar los elementos de un carrito
 * Ruta para eliminar un producto
 * Ruta para confirmar la compra.
 */
Route::get('/listproductos','ProductoController@showListProduct');
Route::get('/listcategorias','CategoriaController@showListCategoria');
Route::post('/productosCategoria/{id}','AuthController@ProductosXCategoria');
Route::post('/carrito/{id_user}/{id_producto}','CarritoController@AgregarProductoCarrito');
Route::get('/carrito/{id_user}','CarritoController@ShowCarrito');
Route::post('/EliminarCarrito/{id_user}/{id_producto}','CarritoController@EliminarProductoCarrito');
Route::post('/Compra/{id_user}','CarritoController@ConfirmarCompra');
Route::post('/getuser', 'AuthController@getUser');