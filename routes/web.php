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

Route::get('/login', 'UserController@login')
    ->middleware('guest')->name('user.login');
Route::post('/login', 'UserController@authenticate')
    ->middleware('guest')->name('user.auth');
Route::get('/register', 'UserController@register')
    ->middleware('guest')->name('user.register');
Route::post('/register', 'UserController@create')
    ->middleware('guest')->name('user.create');
Route::get('/profile', 'UserController@show')->name('user.show');
Route::post('/logout', 'UserController@logout')
    ->middleware('auth')->name('user.logout');

Route::get('/forgot-password', 'UserController@passwordRequest')
    ->middleware('guest')->name('password.request');
Route::post('/forgot-password', 'UserController@passwordEmail')
    ->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', 'UserController@passwordReset')
    ->middleware('guest')->name('password.reset');
Route::post('/reset-password', 'UserController@passwordUpdate')
    ->middleware('guest')->name('password.update');
