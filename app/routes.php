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

Route::resource('/','BooksController');
Route::get('/{id}/edit','BooksController@edit');
Route::post('/{id}/update','BooksController@update');
Route::get('/delete/{id}','BooksController@destroy');
