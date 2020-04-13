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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/articles', 'WelcomeController@articles')->name('articles');
Route::get('/about', 'WelcomeController@about')->name('about');
Route::get('/contact', 'WelcomeController@contact')->name('contact');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/trashed-posts', 'PostsController@trashed')->name('trashed.index');
    Route::get('/trashed-posts/{id}', 'PostsController@restore')->name('trashed.restore');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/posts', 'PostsController')->except(['show']);
    Route::resource('/tags', 'TagsController');
    Route::get('/dashboard-visitor', 'VisitorDashboardController@edit')->name('visitor.dashboard.edit');
    Route::put('/dashboard-visitor', 'VisitorDashboardController@update')->name('visitor.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::post('/users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/users/{user}/profile', 'UsersController@edit')->name('users.edit');
    Route::post('/users/{user}/profile', 'UsersController@update')->name('users.update');
});
