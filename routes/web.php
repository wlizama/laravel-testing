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

Route::get('/galeria', 'GaleriaController@getGaleria');

Route::get('/galeria/create', 'GaleriaController@formImage')->middleware('auth');
Route::post('/galeria/create', 'GaleriaController@addImage')->middleware('auth');
Route::get('/galeria/{imgID}', 'GaleriaController@showImageById');

Auth::routes();
Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::post('/auth/facebook/register', 'SocialAuthController@register');

Route::get('/{username}/followers', 'UserController@followers');
Route::get('/{username}/follows', 'UserController@follows');
Route::post('/{username}/follow', 'UserController@follow');
Route::post('/{username}/unfollow', 'UserController@unfollow');
Route::get('/{username}', 'UserController@getGallleryOfUser');