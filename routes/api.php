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

//GET Tasks
Route::get('/task', 'TaskController@index');

//GET Task by ID
Route::get('/task/{id}', 'TaskController@show')->where('id', '[0-9]+');

//POST Task by ID
Route::post('/task', 'TaskController@store');

//PUT Task by ID
Route::put('/task/{id}', 'TaskController@update');

//PUT Task by ID
Route::put('/task/complete/{id}', 'TaskController@complete');

//PUT Task by ID
Route::put('/task/uncomplete/{id}', 'TaskController@unComplete');

//DELETE Task by ID
Route::delete('/task/{id}', 'TaskController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
