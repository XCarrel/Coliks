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

Route::post('locations/contract', 'contractController@show')->name('contract');

Route::get('/locations/contract', function () {
    return view('contract');
})->name('showContract');

Route::get('/locations', function () {

    return view('locations');
})->name('locations');

Route::get('/locations', 'locationsController@showCities');

Route::get('locations/autocomplete_lastname', 'locationsController@autocomplete_lastname')->name('autocomplete_lastname');
Route::post('locations', 'locationsController@showForm')->name('ajax');
Route::post('locations/client', 'locationsController@storeCustomer')->name('create_user');
Route::post('locations/client/update', 'locationsController@update')->name('update');
