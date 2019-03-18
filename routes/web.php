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
    Route::get('admin/login','LoginController@getLogin')->middleware('CheckLogin');
    Route::post('admin/login','LoginController@postLogin');
    Route::prefix('admin')->middleware('UserAdmin')->group(function () {
        Route::get('users','UsersController@getUsers');
        Route::get('add-user','UsersController@addUser');
        Route::post('add-user','UsersController@saveUser') ;
        Route::get('deleteuser/{id}','UsersController@deleteUsers');
        Route::get('dashboard','DashboardController@getDashboard') ;
        Route::get('logout','LogoutController@getLogout');
        Route::get('user','UsersController@getProfile') ;
        Route::post('user','UsersController@editProfile') ;
        Route::get('category','CategoryController@getCategory') ;
        Route::get('form-category','CategoryController@getFormCategory') ;
        Route::post('form-category','CategoryController@updateCategory') ;
        Route::get('edit-category/{id}','CategoryController@editCategory') ;
        Route::post('edit-category/{id}','CategoryController@updateCategory') ;
        Route::get('delete-category/{id}','CategoryController@deleteCategory') ;
        Route::get('store','StoreController@getStore') ;
        Route::get('add-store','StoreController@addStore') ;
        Route::post('add-store','StoreController@savestore') ;
        Route::get('edit-store/{id}','StoreController@editStore') ;
        Route::post('edit-store/{id}','StoreController@saveStore') ;
        Route::get('delete-store/{id}','StoreController@deleteStore') ;
        Route::get('room','RoomController@getRoom') ;
        Route::get('add-room','RoomController@addRoom') ;
        Route::post('add-room','RoomController@saveRoom') ;
        Route::get('edit-room/{id}','RoomController@editRoom') ;
        Route::post('edit-room/{id}','RoomController@saveRoom') ;
        Route::get('delete-room/{id}','RoomController@deleteRoom') ;
        Route::get('add-list-film','FilmController@addListFilm') ;
        Route::post('add-list-film','FilmController@saveListFilm') ;
        Route::get('edit-list-film/{id}','FilmController@editListFilm') ;
        Route::post('edit-list-film/{id}','FilmController@saveListFilm') ;
        Route::get('delete-list-film/{id}','FilmController@deleteListFilm') ;
        Route::get('list-film','FilmController@getListFilm');
        Route::get('time-show','ListShowFilmController@getTimeShow');
        Route::get('add-time-show','ListShowFilmController@addTimeShow');
        Route::post('add-time-show','ListShowFilmController@saveListShowFilm');
        Route::get('edit-time-show/{id}','ListShowFilmController@editTimeShow');
        Route::post('edit-time-show/{id}','ListShowFilmController@saveListShowFilm');
        Route::get('delete-time-show/{id}','ListShowFilmController@deleteTimeShow');
        Route::get('order','ListShowFilmController@getTimeShow');
        Route::get('add-coupon','CouponController@addCoupon');
        Route::post('add-coupon','CouponController@saveCoupon');
        Route::get('coupon','CouponController@getCoupon');
        Route::get('edit-coupon/{id}','CouponController@editCoupon');
        Route::post('edit-coupon/{id}','CouponController@saveCoupon');
        Route::get('delete-coupon/{id}','CouponController@deleteCoupon');
        Route::get('add-fast-food','FastFoodController@addFastFood');
        Route::post('add-fast-food','FastFoodController@saveFastFood');
        Route::get('fast-food','FastFoodController@getFastFood');
        Route::get('edit-fast-food/{id}','FastFoodController@editFastFood');
        Route::post('edit-fast-food/{id}','FastFoodController@saveFastFood');
        Route::get('delete-fast-food/{id}','FastFoodController@deleteFastFood');
        Route::get('add-order','OrderController@addOrder');
        Route::get('ajax-coupon/{id}','OrderController@ajaxGetCoupon');
        Route::get('ajax-time-show/{id}','OrderController@ajaxGetTimeShow');
        Route::post('add-order','OrderController@saveOrder');
        Route::get('edit-order/{id}','OrderController@editOrder');
        Route::post('edit-order/{id}','OrderController@saveOrder');
        Route::get('order','OrderController@getOrder');
    });
});


Auth::routes();
Route::get('home','Frontend\HomeController@index');
Route::get('step1','Frontend\BookController@getStep1');

