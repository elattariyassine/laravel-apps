<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/p/create', 'PostsController@create')->name('posts.create');
Route::get('/profile/{user}', 'ProfilesController@index')->name('userProfile.show');
Route::post('/p', 'PostsController@store')->name('posts.store');
Route::get('/p/{post}', 'PostsController@show')->name('posts.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('userProfile.edit');
Route::put('/profile/{user}', 'ProfilesController@update')->name('userProfile.update');
