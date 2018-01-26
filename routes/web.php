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

Route::get('/galeria', 'GaleriaController@search');

Route::get('/galeria/{imgID}', 'GaleriaController@showImageById');

Auth::routes();
Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::post('/auth/facebook/register', 'SocialAuthController@register');


//Middleware para proteger rutas por autenticación
Route::group(['middleware' => 'auth'], function (){
  Route::get('/galeria/create', 'GaleriaController@formImage');
  Route::post('/galeria/create', 'GaleriaController@addImage');//->middleware('auth')

  Route::post('/{username}/dms', 'UserController@sendPrivateMessage');
  
  Route::post('/{username}/follow', 'UserController@follow');
  Route::post('/{username}/unfollow', 'UserController@unfollow');
  
  Route::get('/conversations/{conversation}', 'UserController@showConversation');

  Route::get('/api/notifications', 'UserController@notifications');

});

Route::get('/api/galeria/{message}/responses', 'GaleriaController@responses');


Route::get('/{username}/followers', 'UserController@followers');
Route::get('/{username}/follows', 'UserController@follows');
Route::get('/{username}', 'UserController@getGallleryOfUser');