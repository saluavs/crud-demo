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
    return view('welcome');
});

Auth::routes();

Route::resource('/notas', 'NotaController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editar/{id}', 'HomeController@editar')->name('notas.editar');

Route::put('/editar/{id}', 'HomeController@update')->name('notas.editar');

Route::delete('/eliminar/{id}', 'HomeController@eliminar')->name('notas.eliminar');
