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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'PostsController@index')->name('posts');
Route::get('/profile', 'ProfileController@edit');
Route::post('update_profile', 'ProfileController@update')->name('update_profile');
Route::post('add', 'PostsController@store')->name('add');
Route::post('delete', 'PostsController@destroy')->name('delete');
Route::post('comment', 'PostsController@destroy')->name('comment');
Route::post('edit', 'PostsController@edit')->name('edit');
Route::post('update', 'PostsController@update')->name('update');