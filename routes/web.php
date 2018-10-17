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
Route::get('/home','threadController@index')->name('home');
Route::get('/','threadController@index')->name('index');
Route::get('/index','threadController@index')->name('index');
Route::get('/thread/{channel}/{thread}','threadController@show');
Auth::routes();
Route::post('/newthreads','threadController@newthreads');
Route::post('/threads','threadController@store');
Route::post('/threads/{channel}/{thread}/replies','ReplyController@store');
Route::Post('/threads/{thread}/replies','RepliesController@reply')->name('reply');
Route::get('/threads/create', 'threadController@create');

