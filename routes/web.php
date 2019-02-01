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

Route::get('/locations', 'customerController@showCities');

Route::get('locations/autocomplete_lastname', 'customerController@autocomplete_lastname')->name('autocomplete_lastname');
Route::post('locations', 'customerController@showForm')->name('ajax');
Route::post('locations/client', 'customerController@storeCustomer')->name('create_user');
Route::post('locations/client/update', 'customerController@update')->name('update');
Route::post('locations/contract/show', 'contractController@showContract');
