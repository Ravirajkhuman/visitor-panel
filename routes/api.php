<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/getVisitorList', 'App\Http\Controllers\VisitorsController@getVisitorList');
Route::get('/getVisitorList/{id}', 'App\Http\Controllers\VisitorsController@show');
Route::post('/addVisitors', 'App\Http\Controllers\VisitorsController@store');
Route::delete('/deleteVisitor/{id}', 'App\Http\Controllers\VisitorsController@delete');
