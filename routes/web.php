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
Route::get('/', 'App\Http\Controllers\PostController@index')->name('main');

Route::get('/about', function () {
    return view('about')->with('title', 'О нас');
})->name('about');

Route::get('/admin', 'App\Http\Controllers\FeedbackController@index')->name('admin');

Route::get('/contacts', 'App\Http\Controllers\FeedbackController@show')->name('contacts');
Route::post('/contacts', 'App\Http\Controllers\FeedbackController@store')->name('Store message');

Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('Store Post');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('New Post');
Route::get('/posts/{slug}', 'App\Http\Controllers\PostController@show')->name('View Post');
