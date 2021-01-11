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
    return view('about');
})->name('about');

Route::get('/admin', 'App\Http\Controllers\FeedbackController@index')->name('admin');

Route::get('/contacts', 'App\Http\Controllers\FeedbackController@show')->name('contacts');
Route::post('/contacts', 'App\Http\Controllers\FeedbackController@store')->name('Store message');

Route::resource('posts', 'App\Http\Controllers\PostController');

Route::get('/login', 'App\Http\Controllers\UserController@login')
    ->middleware('guest')->name('user.login');
Route::post('/login', 'App\Http\Controllers\UserController@authenticate')
    ->middleware('guest')->name('user.auth');
Route::get('/register', 'App\Http\Controllers\UserController@register')
    ->middleware('guest')->name('user.register');
Route::post('/register', 'App\Http\Controllers\UserController@create')
    ->middleware('guest')->name('user.create');
Route::get('/profile', 'App\Http\Controllers\UserController@show')->name('user.show');
Route::post('/logout', 'App\Http\Controllers\UserController@logout')
    ->middleware('auth')->name('user.logout');

Route::get('/forgot-password', 'App\Http\Controllers\UserController@passwordRequest')
    ->middleware('guest')->name('password.request');
Route::post('/forgot-password', 'App\Http\Controllers\UserController@passwordEmail')
    ->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', 'App\Http\Controllers\UserController@passwordReset')
    ->middleware('guest')->name('password.reset');
Route::post('/reset-password', 'App\Http\Controllers\UserController@passwordUpdate')
    ->middleware('guest')->name('password.update');
