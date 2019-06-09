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
Route::get('/', 'HomeController@index');


Route::resource("UsuarioGlicoseRegistros", "UsuarioGlicoseRegistroController");
Route::resource("UsuarioAlturaRegistros", "UsuarioAlturaRegistroController");
Route::resource("UsuarioPesoRegistros", "UsuarioPesoRegistroController");
Route::resource("UsuarioBatimentosRegistros", "UsuarioBatimentosCardiacosRegistroController");
Route::resource("UsuarioPressaoArterialRegistros", "UsuarioPressaoArterialRegistroController");


Route::post("users",'UserController@store');
Route::get("users",'UserController@index');
Route::get("users/create",'UserController@create');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
