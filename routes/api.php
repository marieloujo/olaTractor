<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('tracteurs', 'api\TracteurController@index');
Route::get('tracteurs/{idUser}', 'api\TracteurController@tracteurs_disponible_proximite');


Route::get('locations', 'api\LocationController@index');
Route::get('locations/{idUser}', 'api\LocationController@listes_des_demandes_de_location');
Route::post('locations', 'api\LocationController@store');
Route::put('locations/{id}', 'api\LocationController@update');

Route::get('localites', 'api\LocationController@localites');



Route::post('tracking', 'api\TracteurController@store_tracking');
