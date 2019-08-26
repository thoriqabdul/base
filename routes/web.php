<?php

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/data', 'UserController@data')->name('users.data');
        Route::get('/create', 'UserController@createWithModal')->name('users.create');
        Route::post('/', 'UserController@store')->name('users.store');
        Route::get('/edit/{id}/edit', 'UserController@editWithModal')->name('users.edit');
        Route::put('/update/{id}', 'UserController@update')->name('users.update');
        Route::delete('/delete/{id}', 'UserController@destroy')->name('users.delete');
    });
});
