<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'app'], function() {

        Route::get('dashboard', 'app\DashboardController@index')->name("app_accueil");

        
        Route::get('user-profile', 'app\UserController@profile')->name("app_user_profile");

        Route::get('tracteurs', 'app\TracteurController@index')->name("app_tracteurs");
        Route::post('tracteurs/add', 'app\TracteurController@store')->name("app_add_tracteurs");
        Route::post('tracteurs/update/{id}', 'app\TracteurController@update')->name("app_update_tracteurs");
        Route::post('tracteurs/delete/{id}', 'app\TracteurController@destroy')->name("app_delete_tracteurs");

        Route::get('tracking/{idTracteur}', 'app\TracteurController@tracking')->name("app_tracking");


        Route::group(['middleware' => 'isAdmin'], function() {

            Route::get('users', 'app\UserController@index')->name("app_users");

        });

    });

});



Route::resource('/tractors','app\TracteurRessourceController');


Auth::routes();
