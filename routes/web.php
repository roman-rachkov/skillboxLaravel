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

Route::get('/', 'PostsController@index')->name('main');

Route::view('/about', 'about')->name('about');

Route::get('/admin', 'FeedbackController@index')->name('admin');

Route::get('/contacts', 'FeedbackController@show')->name('contacts');
Route::post('/contacts', 'FeedbackController@store')->name('Store message');

Route::get('/posts/tags/{tag}', 'TagsController@index')->name('tag');

Route::resource('posts', 'PostsController');

Route::get('/profile/{user}', 'UserController@show')->name('user.show');
