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

Route::get('locations/contract/{id}/', function ($name) {
    return redirect()->route('contract', $name);
})->name('new_contract');

Route::get('/contract', function () {
    return view('contract');
})->name('contract');

Route::get('/locations', function () {

    return view('locations');
})->name('locations');

Route::get('/locations', 'locationsController@showCities');

Route::get('locations/autocomplete_lastname', 'locationsController@autocomplete_lastname')->name('autocomplete_lastname');
Route::post('locations', 'locationsController@showForm')->name('ajax');
Route::post('locations/client', 'locationsController@storeClient')->name('create_user');
Route::post('locations/client/{id}', 'locationsController@update')->name('update');
