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

Route::get('locations', 'locationsController@index')->name('locations');
Route::get('locations/autocomplete_lastname', 'locationsController@autocomplete_lastname')->name('autocomplete_lastname');
Route::post('locations', 'locationsController@showForm')->name('ajax');

