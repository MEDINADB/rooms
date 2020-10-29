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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/index', 'UserController@index');

Route::resource('/users', 'UserController');

Route::get('/users/create','UserController@create');  //crear productos //formulario
Route::post('/users','UserController@store');  //crea ->guardar datos en la db

Route::get('/users/{id}/edit','UserController@edit');  //ver formulario
Route::post('/users/{id}/edit','UserController@update');  //crea ->guardar datos en la db