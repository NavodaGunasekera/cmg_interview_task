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



Route::get('/create','UserController@userCreateUI');

Route::post('/save','UserController@store');

Route::get('/','UserController@index');

Route::get('/edit/{id}','UserController@edit');

Route::post('/update/{id}','UserController@update');

Route::get('/delete/{id}','UserController@delete');