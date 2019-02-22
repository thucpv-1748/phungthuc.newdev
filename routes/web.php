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
route::namespace('Backend')->group(function (){
    Route::prefix('admin')->group(function () {
        Route::get('users','UsersController@getUsers');
        Route::get('login','LoginController@getLogin');
        Route::post('login','LoginController@postLogin');
        Route::get('dashboard','DashboardController@getDashboard');
        Route::get('logout','LogoutController@getLogout');


    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
