<?php
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->resource('usuarios','UsuariosController');
Route::middleware('auth')->resource('categorias','CategoriasController');
