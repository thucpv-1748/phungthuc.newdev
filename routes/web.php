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
        Route::get('users','UserController@getUsers');
        Route::get('add-user','UserController@addUser');
        Route::post('add-user','UserController@createUser');
        Route::get('edit-user/{id}','UserController@editUser');
        Route::post('edit-user/{id}','UserController@updateUser') ;
        Route::get('deleteuser/{id}','UserController@deleteUsers');
        Route::get('dashboard','DashboardController@getDashboard') ;
        Route::get('logout','LogoutController@getLogout');
        Route::get('user','UserController@getProfile') ;
        Route::post('user','UserController@updateuser') ;
        Route::get('category','CategoryController@getCategory') ;
        Route::get('form-category','CategoryController@getFormCategory') ;
        Route::post('form-category','CategoryController@createCategory') ;
        Route::get('edit-category/{id}','CategoryController@editCategory') ;
        Route::post('edit-category/{id}','CategoryController@updateCategory') ;
        Route::get('delete-category/{id}','CategoryController@deleteCategory') ;
        Route::get('store','StoreController@getStore') ;
        Route::get('add-store','StoreController@addStore') ;
        Route::post('add-store','StoreController@createStore') ;
        Route::get('edit-store/{id}','StoreController@editStore') ;
        Route::post('edit-store/{id}','StoreController@updateStore') ;
        Route::get('delete-store/{id}','StoreController@deleteStore') ;
        Route::get('room','RoomController@getRoom') ;
        Route::get('add-room','RoomController@addRoom') ;
        Route::post('add-room','RoomController@createRoom') ;
        Route::get('edit-room/{id}','RoomController@editRoom') ;
        Route::post('edit-room/{id}','RoomController@updateRoom') ;
        Route::get('delete-room/{id}','RoomController@deleteRoom') ;
        Route::get('add-list-film','FilmController@addFilm') ;
        Route::post('add-list-film','FilmController@createFilm') ;
        Route::get('edit-list-film/{id}','FilmController@editFilm') ;
        Route::post('edit-list-film/{id}','FilmController@updateFilm') ;
        Route::get('delete-list-film/{id}','FilmController@deleteFilm') ;
        Route::get('list-film','FilmController@getFilm');
        Route::get('time-show','ListShowFilmController@getTimeShow');
        Route::get('add-time-show','ListShowFilmController@addTimeShow');
        Route::post('add-time-show','ListShowFilmController@createListShowFilm');
        Route::get('edit-time-show/{id}','ListShowFilmController@editTimeShow');
        Route::post('edit-time-show/{id}','ListShowFilmController@updateListShowFilm');
        Route::get('delete-time-show/{id}','ListShowFilmController@deleteTimeShow');
        Route::get('order','ListShowFilmController@getTimeShow');
        Route::get('add-coupon','CouponController@addCoupon');
        Route::post('add-coupon','CouponController@createCoupon');
        Route::get('coupon','CouponController@getCoupon');
        Route::get('edit-coupon/{id}','CouponController@editCoupon');
        Route::post('edit-coupon/{id}','CouponController@updateCoupon');
        Route::get('delete-coupon/{id}','CouponController@deleteCoupon');
        Route::get('add-fast-food','FastFoodController@addFastFood');
        Route::post('add-fast-food','FastFoodController@createFastFood');
        Route::get('fast-food','FastFoodController@getFastFood');
        Route::get('edit-fast-food/{id}','FastFoodController@editFastFood');
        Route::post('edit-fast-food/{id}','FastFoodController@updateFastFood');
        Route::get('delete-fast-food/{id}','FastFoodController@deleteFastFood');
        Route::get('add-order','OrderController@addOrder');
        Route::get('ajax-coupon/{id}','OrderController@ajaxGetCoupon');
        Route::get('ajax-time-show/{id}','OrderController@ajaxGetTimeShow');
        Route::post('add-order','OrderController@createOrder');
        Route::get('edit-order/{id}','OrderController@editOrder');
        Route::post('edit-order/{id}','OrderController@updateOrder');
        Route::get('order','OrderController@getOrder');
        Route::get('add-role','UserController@addRole');
        Route::post('add-role','UserController@createRole');
        Route::get('role','UserController@getRole');
        Route::get('edit-role/{id}','UserController@editRole');
        Route::post('edit-role/{id}','UserController@updateRole');

    });
});


    Auth::routes();
    route::namespace('Frontend')->group(function () {
        Route::get('home', 'HomeController@index');
        Route::middleware('CheckLoginUser')->group(function () {
            Route::get('book', 'BookController@getBook');
            Route::get('step1/{id}', 'BookController@getStep1');
            Route::post('step1/{id}', 'BookController@postStep1');
            Route::get('step2/{id}', 'BookController@getStep2');
            Route::post('step2/{id}', 'BookController@postStep2');
            Route::get('step3', 'BookController@getStep3');
            Route::post('step3', 'BookController@createOrder');
            Route::get('thank-you/{id}', 'BookController@getThankYou');
        });
        Route::middleware('LoginUser')->group(function () {
        Route::get('login', 'LoginController@getLogin');
        Route::post('login', 'LoginController@postLogin');
        });
        Route::get('logout', 'LoginController@getLogout');
        Route::get('registration', 'LoginController@getRegistration');
        Route::post('registration', 'LoginController@createUser');
        Route::get('film/{id}', 'FilmController@getFilm');
        Route::get('category/{id}', 'FilmController@getCategory');
        //ajax find  in category
        Route::post('get-data', 'FilmController@getData');
        Route::post('check-coupon', 'BookController@getCoupon');
        Route::get('cinema', 'CinemaController@getAll');
        Route::get('coming-soon', 'CinemaController@getComingSoon');
        Route::get('contact', 'CinemaController@getContact');
        Route::post('get-time-date', 'BookController@getTimeByDate');
        Route::post('post-comment', 'FilmController@createComment');
    });
