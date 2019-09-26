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
Route::get('login', 'Auth\LoginController@showUserLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// GET - Show the form for creating a new resource
Route::get('/', 'EntryController@create')->name('entries.create');

// POST - Store a newly created resource in storage
Route::post('/', 'EntryController@store')->name('entries.store');

// PUT - Update the specified resource in storage
Route::put('/{entry}', 'EntryController@update')->name('entries.update');

// DELETE - Remove the specified resource from storage
Route::delete('/{entry}', 'EntryController@destroy')->name('entries.destroy');

Route::group(['middleware' => 'auth'], function () {
    // GET - Display a listing of the resource: must be logged in
    Route::get('dashboard', 'EntryController@index')->name('dashboard');

    // GET - Display the specified resource
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    // POST - Store a newly created resource in storage
    Route::post('users', 'UserController@store')->name('users.store');
    // PUT - Update the specified resource in storage
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    // DELETE - Remove the specified resource from storage
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

    // GET - Display the specified resource
    Route::get('centres/{centre}', 'CentreController@show')->name('centres.show');
    // POST - Store a newly created resource in storage
    Route::post('centres', 'CentreController@store')->name('centres.store');
    // PUT - Update the specified resource in storage
    Route::put('centres/{centre}', 'CentreController@update')->name('centres.update');
    // DELETE - Remove the specified resource from storage
    Route::delete('centres/{centre}', 'CentreController@destroy')->name('centres.destroy');

    Route::post('user_centres/{user}', 'UserCentreController@update')->name('user_centre.update');
});