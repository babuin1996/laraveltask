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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users/index')->middleware('can:read-user');
Route::get('/users/show/{id}', 'UserController@show')->name('users/show')->middleware('can:read-user');
Route::get('/users/create', 'UserController@create')->name('users/create')->middleware('can:create-user');
Route::get('/users/update/{id}', 'UserController@edit')->name('users/edit')->middleware('can:update-user');
Route::get('/users/delete/{id}', 'UserController@delete')->name('users/delete')->middleware('can:delete-user');
Route::post('/users/store', 'UserController@store')->name('users/store')->middleware('can:create-user');
Route::post('/users/update/{id}', 'UserController@update')->name('users/update')->middleware('can:update-user');
Route::post('/users/destroy/{id}', 'UserController@destroy')->name('users/destroy')->middleware('can:delete-user');

