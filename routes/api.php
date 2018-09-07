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

Route::group(['prefix'=>'/v1', 'namespace' => 'Api\V1'], function () {
    Route::post('/login/social', 'AuthController@socialLogin');
    Route::post('/register', 'GuestController@register');
    Route::get('/genders', 'GuestController@getGenders');
    Route::get('/styles', 'GuestController@getStyles');
});
