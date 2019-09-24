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
});