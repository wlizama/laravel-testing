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

Route::get('/', 'GaleriaController@getGaleria');

Route::get('/about-us', 'AboutUsController@aboutUs');

Route::get('/user/{nickname}', 'UserController@userNickname');

Route::get('/galeria', 'GaleriaController@getGaleria');

Route::get('/galeria/create', 'GaleriaController@formImage')->middleware('auth');
Route::post('/galeria/create', 'GaleriaController@addImage')->middleware('auth');
Route::get('/galeria/{imgID}', 'GaleriaController@showImageById');

Auth::routes();
