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

Route::get('/', 'PagesController@index')->name('enter');
Route::get('/admin', 'PagesController@admin');

Route::get('/songs', 'SongsController@overview');
Route::get('/songs/add', 'SongsController@addSong');
Route::post('/songs/add', 'SongsController@addSong');
Route::post('/songs/delete/{song_id}', 'SongsController@deleteSong');
Route::delete('/songs/delete/{song_id}', 'SongsController@deleteSong');
Route::get('/songs/edit/{song_id}', 'SongsController@editSong');

Auth::routes();

Route::get('/home', 'HomeController@index');
