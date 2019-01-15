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
Route::get('autocomplete_lastname', 'locationsController@autocomplete_lastname')->name('autocomplete_lastname');
Route::get('autocomplete_firstname', 'locationsController@autocomplete_firstname')->name('autocomplete_firstname');
Route::post('locations/ajaxvalue', 'locationsController@index')->name('index');
