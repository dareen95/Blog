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

Route::get('/posts', 'PagesController@index')->name('posts.index');

Route::get('/posts/{post}','PagesController@show')->name('posts.show');
Route::post('/posts/store','PagesController@store')->name('posts.store');
Route::get('/posts/create','PagesController@create')->name('posts.create');
Route::post('/posts/{post}/store','CommentController@store')->name('comments.store');
Route::get('/categories/{name}','CategoryController@store')->name('comments.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
