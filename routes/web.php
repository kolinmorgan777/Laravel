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

Auth::routes();



//заблокирует регистрацию
//Route::get('register', function() {
//
//    if (!Auth::check()) {
//        return redirect('/');
//    } else {
//        return view('auth.register');
//    }
//
////    return redirect('register');
//});
//Route::get('register', 'RegisterChange@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
Route::match(['get','post'],'/editing/{id}', 'EditController@editing')->name('editing');
//Route::match(['get','post'],'/editing_post/{id}', 'EditController@editing_post')->name('editing_post');
Route::match(['get','post'],'/delete/{page}', 'EditController@delete')->name('delete');
Route::match(['get','post'],'/add', 'EditController@add')->name('add');
//Route::get('/message', 'Articles_Users@index')->name('message');
//Route::post('/message', 'Articles_Users@post')->name('message');

Route::group(['prefix' => 'user', 'middleware' => ['web', 'auth']], function() {
    Route::get('/', ['uses' => 'User\UserController@show', 'as' => 'user_index']);
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('verify', function () {
    echo 'Подтвердите email на почте';
})->name('verify');

Route::get('/email/confirmation/{token}', 'VerifyEmailController@confirm')->name('email.confirmation');
