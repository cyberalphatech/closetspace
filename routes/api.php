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

Route::group(['prefix'=>'/v1', 'namespace' => 'Api\V1'], function () {
    Route::post('/login/social', 'AuthController@socialLogin');
    Route::post('/login', 'AuthController@localLogin');
    Route::post('/register', 'GuestController@register');
    Route::get('/genders', 'GuestController@getGenders');
    Route::get('/styles', 'GuestController@getStyles');
    Route::get('/categories', 'GuestController@getCategories');
    Route::get('/measure-types', 'UserController@getMeasureType');
    Route::post('/measure', 'UserController@postMeasure');
    Route::get('/sub-categories', 'UserController@getSubcategories');
    Route::get('/brands', 'BrandController@index');
    Route::get('/models', 'UserController@getModels');
    Route::get('/colors', 'UserController@getColors');
    Route::get('/items', 'ItemController@index');
    Route::post('/items', 'UserController@addItem');

    Route::group(['middleware'=> ['auth:api']], function () {
        Route::get('/me/logout', 'AuthController@logout');
        Route::get('/me', 'UserController@show');
    });
});

