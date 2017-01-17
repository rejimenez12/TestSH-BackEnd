<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index_user/','UserController@index');
Route::get('/edit_user/','UserController@edit');
Route::post('/create_user/','UserController@create');
Route::get('/show_user/','UserController@show');
Route::post('/update_user/','UserController@update');
Route::get('/delete_user/{id}/','UserController@destroy');



