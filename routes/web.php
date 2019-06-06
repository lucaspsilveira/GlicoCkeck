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
Route::get('/', function() {
    return view("index");
});



Route::post("UsuarioGlicoseRegistros",'UsuarioGlicoseRegistroController@store');
Route::get("UsuarioGlicoseRegistros",'UsuarioGlicoseRegistroController@index');
Route::get("UsuarioGlicoseRegistros/create",'UsuarioGlicoseRegistroController@create');

Route::post("UsuarioAlturaRegistros",'UsuarioAlturaRegistroController@store');
Route::post("UsuarioPesoRegistros",'UsuarioPesoRegistroController@store');
Route::post("UsuarioBatimentosCardiacosRegistros",'UsuarioBatimentosCardiacosRegistroController@store');
Route::post("UsuarioPressaoArterialRegistros",'UsuarioPressaoArterialRegistroController@store');

Route::post("users",'UserController@store');
Route::get("users/create",'UserController@create');

// Route::get('/', function () {
//     return view('welcome');
// });