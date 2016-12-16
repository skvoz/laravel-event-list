<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//register
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'Admin\HomeController@index');
    //    Route::get('/user/{id}', 'Admin\HomeController@view');
    Route::get('/user/delete/{id}', 'Admin\HomeController@delete');
    Route::get('/user/update/{id}', 'Admin\HomeController@update');
    Route::post('/user/store/{id?}', 'Admin\HomeController@store');
    Route::get('/user/create', 'Admin\HomeController@create');

    Route::get('/event', 'Admin\EventController@index');
    Route::get('/event/view/{id}', 'Admin\EventController@view');
    Route::get('/event/delete/{id}', 'Admin\EventController@delete');
    Route::get('/event/update/{id}', 'Admin\EventController@update');
    Route::post('/event/store/{id?}', 'Admin\EventController@store');
    Route::get('/event/create', 'Admin\EventController@create');
    Route::get('/event/list', 'Admin\EventController@eventList');
    Route::get('/event/assign', 'Admin\EventController@assign');
    Route::post('/event/assign-store', 'Admin\EventController@assignStore');
});

