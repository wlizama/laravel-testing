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


Route::get('/about-us',  'AboutUsController@aboutUs');

Route::get('/user/{nickname}',  'UserController@userNickname');

Route::get('/galeria',  'GaleriaController@getGaleria');

Route::get('/galeria/create',  'GaleriaController@formImage');
Route::post('/galeria/create',  'GaleriaController@addImage');
Route::get('/galeria/{imgID}',  'GaleriaController@showImageById');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
