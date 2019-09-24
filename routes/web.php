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

//Auth::routes([]);

Route::get('/', function () {
    return view('pages.index');
});

Route::get('login', 'Auth\LoginController@showUserLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'EntryController@index')->name('dashboard');
//    Route::get('admin-dashboard', 'UserDashboardController@index')->name('dashboard.index');
});