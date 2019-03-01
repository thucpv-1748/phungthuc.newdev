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
        Route::get('users','UsersController@getUsers')->middleware('UserAdmin');
        Route::post('users','UsersController@addUser')->middleware('UserAdmin');
        Route::post('ajaxgetuser','UsersController@ajaxGetUser')->middleware('UserAdmin');
        Route::get('deleteuser/{id}','UsersController@deleteUsers')->middleware('UserAdmin');
        Route::get('login','LoginController@getLogin')->middleware('CheckLogin');
        Route::post('login','LoginController@postLogin');
        Route::get('dashboard','DashboardController@getDashboard')->middleware('UserAdmin');
        Route::get('logout','LogoutController@getLogout');
        Route::get('user','UsersController@getProfile')->middleware('UserAdmin');
        Route::post('user','UsersController@editProfile')->middleware('UserAdmin');
        Route::get('category','CategoryController@getCategory')->middleware('UserAdmin');
        Route::get('form-category','CategoryController@getFormCategory')->middleware('UserAdmin');
        Route::post('form-category','CategoryController@updateCategory')->middleware('UserAdmin');
        Route::get('edit-category/{id}','CategoryController@editCategory')->middleware('UserAdmin');
        Route::post('edit-category/{id}','CategoryController@updateCategory')->middleware('UserAdmin');
        Route::get('delete-category/{id}','CategoryController@deleteCategory')->middleware('UserAdmin');
        Route::get('store','StoreController@getStore')->middleware('UserAdmin');
        Route::get('add-store','StoreController@addStore')->middleware('UserAdmin');
        Route::post('add-store','StoreController@savestore')->middleware('UserAdmin');
        Route::get('edit-store/{id}','StoreController@editStore')->middleware('UserAdmin');
        Route::post('edit-store/{id}','StoreController@saveStore')->middleware('UserAdmin');
        Route::get('delete-store/{id}','StoreController@deleteStore')->middleware('UserAdmin');
        Route::get('room','RoomController@getRoom')->middleware('UserAdmin');
        Route::get('add-room','RoomController@addRoom')->middleware('UserAdmin');
        Route::post('add-room','RoomController@saveRoom')->middleware('UserAdmin');


    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
