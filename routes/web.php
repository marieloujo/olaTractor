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

        
        Route::get('profile', 'app\UserController@profile')->name("app_user_profile");
        Route::post('profile/update', 'app\UserController@upadate_profile')->name("app_user_profile_update");



        Route::get('tracteurs', 'app\TracteurController@index')->name("app_tracteurs");
        Route::post('tracteurs/add', 'app\TracteurController@store')->name("app_add_tracteurs");
        Route::post('tracteurs/update/{id}', 'app\TracteurController@update')->name("app_update_tracteurs");
        Route::post('tracteurs/delete/{id}', 'app\TracteurController@destroy')->name("app_delete_tracteurs");
        
        Route::get('tracteurs/export', 'app\TracteurController@export')->name("app_tracteurs_export");


        Route::get('tracking/{idTracteur}', 'app\TracteurController@tracking')->name("app_tracking");



        Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin'], function() {

            Route::get('users/proprietaires', 'app\UserController@proprietaire')->name("app_admin_users_proprietaires");
            Route::get('users/agricoles', 'app\UserController@agricoles')->name("app_admin_users_agricoles");
            Route::get('users/profile/{idUser}', 'app\UserController@profilebyUser')->name("app_admin_user_profile");
            Route::get('users/pieces/{idUser}', 'app\UserController@pieces_fournir')->name("app_admin_user_pieces");

            Route::get('tracteurs/{idUser}', 'app\TracteurController@findbyUser')->name("app_admin_tracteurs_by_user");

        });


    });

});



Route::resource('/tractors','app\TracteurRessourceController');


Auth::routes();


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
