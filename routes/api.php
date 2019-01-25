<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/post/create', 'ClientController@store');
Route::get('/post/edit/{id}', 'ClientController@edit');
Route::post('/post/update/{id}', 'ClientController@update');
Route::delete('/post/delete/{id}', 'ClientController@delete');
Route::get('/posts', 'ClientController@index');