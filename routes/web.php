<?php

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
    return view('auth/login');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('articulos','ArticuloController', ['except' => 'show','create','edit']);

Route::get('/inicio', 'AlmacenController@index');
Route::get('carrito/mostrar', 'CarritoController@mostrar');
Route::get( 'carrito/agregar/{id}', 'CarritoController@agregar');
Route::get( 'carrito/borrar/{id}', 'CarritoController@borrar');
Route::get('carrito/eliminar', 'CarritoController@eliminar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
