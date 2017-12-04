<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//
Route::post('/users/store','App\\Controllers\\User\\UserController@store');
Route::post('/users/update/{id}','App\\Controllers\\User\\UserController@update');
Route::get('/users/destroy/{id}','App\\Controllers\\User\\UserController@destroy');

Route::controller('users','App\\Controllers\\User\\UserController');


Route::get('/', function() {
    return View::make('hello');
});