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



Route::post("UsuarioGlicoseRegistros",'UsuarioGlicoseRegistroController@store');
Route::get("UsuarioGlicoseRegistros",'UsuarioGlicoseRegistroController@index');
Route::get("UsuarioGlicoseRegistros/create",'UsuarioGlicoseRegistroController@create');
Route::delete("UsuarioGlicoseRegistros/{id}",'UsuarioGlicoseRegistroController@destroy');
Route::patch("UsuarioGlicoseRegistros/{id}",'UsuarioGlicoseRegistroController@update');
Route::get("UsuarioGlicoseRegistros/{id}/edit",'UsuarioGlicoseRegistroController@edit');

Route::post("UsuarioAlturaRegistros",'UsuarioAlturaRegistroController@store');
Route::get("UsuarioPesoRegistros",'UsuarioAlturaRegistroController@index');
Route::get("UsuarioPesoRegistros/create",'UsuarioPesoRegistroController@create');
Route::delete("UsuarioPesoRegistros/{id}",'UsuarioPesoRegistroController@destroy');
Route::patch("UsuarioPesoRegistros/{id}",'UsuarioPesoRegistroController@update');
Route::get("UsuarioPesoRegistros/{id}/edit",'UsuarioPesoRegistroController@edit');

Route::post("UsuarioPesoRegistros",'UsuarioPesoRegistroController@store');
Route::get("UsuarioPesoRegistros",'UsuarioPesoRegistroController@index');
Route::get("UsuarioPesoRegistros/create",'UsuarioPesoRegistroController@create');
Route::delete("UsuarioPesoRegistros/{id}",'UsuarioPesoRegistroController@destroy');
Route::patch("UsuarioPesoRegistros/{id}",'UsuarioPesoRegistroController@update');
Route::get("UsuarioPesoRegistros/{id}/edit",'UsuarioPesoRegistroController@edit');

Route::post("UsuarioBatimentosCardiacosRegistros",'UsuarioBatimentosCardiacosRegistroController@store');
Route::get("UsuarioBatimentosCardiacosRegistros",'UsuarioBatimentosCardiacosRegistroController@index');
Route::get("UsuarioBatimentosCardiacosRegistros/create",'UsuarioBatimentosCardiacosRegistroController@create');
Route::delete("UsuarioBatimentosCardiacosRegistros/{id}",'UsuarioBatimentosCardiacosRegistroController@destroy');
Route::patch("UsuarioBatimentosCardiacosRegistros/{id}",'UsuarioBatimentosCardiacosRegistroController@update');
Route::get("UsuarioBatimentosCardiacosRegistros/{id}/edit",'UsuarioBatimentosCardiacosRegistroController@edit');

Route::post("UsuarioPressaoArterialRegistros",'UsuarioPressaoArterialRegistroController@store');
Route::get("UsuarioPressaoArterialRegistros",'UsuarioPressaoArterialRegistroController@index');
Route::get("UsuarioPressaoArterialRegistros/create",'UsuarioPressaoArterialRegistroController@create');
Route::delete("UsuarioPressaoArterialRegistros/{id}",'UsuarioPressaoArterialRegistroController@destroy');
Route::patch("UsuarioPressaoArterialRegistros/{id}",'UsuarioPressaoArterialRegistroController@update');
Route::get("UsuarioPressaoArterialRegistros/{id}/edit",'UsuarioPressaoArterialRegistroController@edit');

Route::post("users",'UserController@store');
Route::get("users",'UserController@index');
Route::get("users/create",'UserController@create');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/registros", 'RegistrosController@index');
