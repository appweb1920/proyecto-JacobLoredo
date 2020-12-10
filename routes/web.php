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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos', 'ProductoController@index')->name('producto')->middleware('auth');
Route::get('/categoria', 'CategoriaController@index')->name('categoria')->middleware('auth');
Route::post('/productos','ProductoController@store');
Route::get('/EditarPR/{id}','ProductoController@edit')->name('EditarPR');
Route::post('/ActualizarPR/{id}','ProductoController@update');

Route::get('/EliminarUser/{id}','HomeController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

