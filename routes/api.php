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

Route::get('/get-children-data', 'ApiController@getChildrenData');

Route::get('/get-updated-children-data', 'ApiController@getUpdatedChildrenData');

Route::get('/get-updated-sponsor-data', 'ApiController@getUpdatedSponsorData');

Route::get('/get-sponsors-data', 'ApiController@getSponsorsData');

Route::get('/get-child-sponsor-data', 'ApiController@getChildSponsorsData');
