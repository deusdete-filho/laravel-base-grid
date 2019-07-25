<?php
Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('bandas/create', 'BandasController@create');
//Route::post('bandas/store', 'BandasController@store');
//Route::get('bandas/{id}/edit', 'BandasController@edit');
//Route::post('bandas/{id}', 'BandasController@update');

//Route::get('categorias/create', 'CategoriasController@create');
//Route::post('categorias/store', 'CategoriasController@store');
//Route::get('categorias/{id}/edit', 'CategoriasController@edit');
//Route::post('categorias/{id}', 'CategoriasController@update');

Route::middleware('auth')->resource('usuarios','UsuariosController');
Route::middleware('auth')->resource('categorias','CategoriasController');
