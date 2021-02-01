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

Route::get('news', 'NewsController@index')->name('news');
Route::get('news/{news}', 'NewsController@show')->name('news.show');

Route::view('/about', 'about')->name('about');

Route::get('/contacts', 'FeedbacksController@show')->name('contacts');
Route::post('/contacts', 'FeedbacksController@store')->name('Store message');

Route::get('/posts/tags/{tag}', 'TagsController@index')->name('tag');

Route::resource('posts', 'PostsController');

Route::get('/profile/{user}', 'UserController@show')->name('user.show');

Route::post('/comments', 'CommentsController@store')->name('comments.store');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'Admin\PostsController@index')->name('main');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('news', 'Admin\NewsController');
    Route::get('feedback', 'Admin\FeedbacksController@index')->name('feedback');
});
