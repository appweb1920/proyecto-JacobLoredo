<?php

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
//La pagina principal solo funciona para el administeador el usuario por defecto esta en el seeder
//
//igual se creo otro para revision=profesor@hotmail.com contraseña=12345678
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos', 'ProductoController@index')->name('producto')->middleware('auth');
Route::post('/productos','ProductoController@store');
Route::get('/EditarPR/{id}','ProductoController@edit')->name('EditarPR');
Route::post('/ActualizarPR/{id}','ProductoController@update');
Route::get('/EliminarPR/{id}','ProductoController@destroy');

Route::get('/EliminarUser/{id}','HomeController@destroy');

Route::get('/categoria', 'CategoriaController@index')->name('categoria')->middleware('auth');
Route::post('/categoria', 'CategoriaController@store');
Route::get('/EditarCat/{id}', 'CategoriaController@edit')->name('EditarCat')->middleware('auth');
Route::post('/ActualizarCat/{id}', 'CategoriaController@update');
Route::get('/EliminarCat/{id}', 'CategoriaController@destroy');

Route::get('/home', 'HomeController@index')->name('home');

