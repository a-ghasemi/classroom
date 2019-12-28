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

Route::prefix('absentpresent/')->middleware('auth:api')->group(function (){
    Route::get('/','AbsentPresentApiController@index');
    Route::get('/{id}','AbsentPresentApiController@show');
    Route::post('/','AbsentPresentApiController@store');
    Route::post('/{id}','AbsentPresentApiController@update');
    Route::post('/delete/{id}','AbsentPresentApiController@destroy');
});

