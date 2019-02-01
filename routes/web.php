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
Route::get('inventory', 'inventoryController@getInventory');

Route::post('additem', 'inventoryController@create');

Route::post('updateitem', 'inventoryController@update');

Route::get('deleteitem/{iditem?}', 'inventoryController@delete');

Route::get('item/{idtem?}', 'inventoryController@read');

Route::get('location/{idtem?}', 'inventoryController@readrenters');
