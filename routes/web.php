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

Route::get('/', 'App\Http\Controllers\PostController@index');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index');
Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('Store Post');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('New Post');
Route::get('/posts/{slug}', 'App\Http\Controllers\PostController@show')->name('View Post');

Route::get('/admin/feedbacks', function (){
    return 'admin';
});
