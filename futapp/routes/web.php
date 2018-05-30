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

Route::get('/','PostsController@index');
Route::get('/index','PostsController@index');
Route::get('/mycards','PostsController@mycards')->middleware('auth');;
Route::get('/market','PostsController@market')->middleware('auth');;
Route::get('/openpack','PostsController@openpack')->middleware('auth');;
Route::get('/openpack/newplayers','PostsController@newplayers')->middleware('auth');;
Route::get('/players','PostsController@players');
Route::post('/players','PostsController@searchPlayer');
Route::get('/players/{filter}/{order}/{show}','PostsController@filter');
Route::get('/mycards/{filter}/{order}/{show}','PostsController@mycardsfilter')->middleware('auth');
Route::get('/players/{player}','PostsController@findplayer');
Route::get('/players/{player}/sell','PostsController@findplayertosell');
Route::get('/leaderboard','PostsController@leaderBoard');
Auth::routes();
Route::post('/sell','PostsController@sell')->middleware('auth');
Route::get('/api/players','PostsController@api');
Route::post('/api/players','PostsController@postTransfer')->middleware('auth');
Route::put('/api/players','PostsController@bidTransfer')->middleware('auth');
Route::get('/api/players/{id}','PostsController@playerById');
Route::delete('/api/players/{id}','PostsController@deleteTransfer')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
