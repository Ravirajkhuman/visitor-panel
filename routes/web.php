<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\VisitorsController@index');
Route::get('/exportcsv', 'App\Http\Controllers\VisitorsController@exportCsv');
Route::get('/visitor-list', 'App\Http\Controllers\VisitorsController@getVisitor');
Route::get('/visitor-add', 'App\Http\Controllers\VisitorsController@getVisitor');
