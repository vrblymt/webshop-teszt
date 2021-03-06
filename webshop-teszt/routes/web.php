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


Auth::routes();
Route::view('/{path?}', 'layouts/app');
Route::get('/news', 'NewsController@index')->name('news');
Route::post('/addNews', 'NewsController@addNews')->name('add');
Route::delete('/removeNew/{new}', 'NewsController@removeNews');