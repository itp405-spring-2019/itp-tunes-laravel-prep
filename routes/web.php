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

Route::get('/', 'InvoicesController@index');
Route::get('/playlists', 'PlaylistController@index');
Route::get('/playlists/new', 'PlaylistController@create');
Route::get('/playlists/{id}', 'PlaylistController@index');
Route::post('/playlists', 'PlaylistController@store');
