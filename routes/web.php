<?php

use Illuminate\Support\Facades\Route;
 
//Las rutas son literalmente las rutas de la url

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('usuarios', 'UserController');
Route::resource('roles', 'RoleController');

Route::resource('/notas/todas', 'NotasController');
Route::get('/notas/favoritas', 'NotasController@favoritas');
Route::get('/notas/archivadas', 'NotasController@archivadas');