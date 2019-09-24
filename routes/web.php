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
    return view('pages.index');
});

Route::get('login', 'Auth\LoginController@showUserLoginForm')->name('login.form');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('login', 'Auth\LoginController@showUserLoginForm');
Route::post('register', 'Auth\RegisterController@login')->name('register');

Route::group(['middleware' => 'auth'], function () {
//    Route::get('admin-dashboard', 'UserDashboardController@index')->name('dashboard.index');
});