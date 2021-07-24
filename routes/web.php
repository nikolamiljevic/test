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



Route::middleware(['auth'])->group(function () {
   
    Route::get('/blogs', 'BlogController@index')->name('blogs');
    Route::get('/blog/{id}', 'BlogController@show')->name('blog.show');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    Route::post('/blog/update/{id}', 'BlogController@update')->name('blog.update');
    Route::post('/blog/delete/{id}', 'BlogController@destroy')->name('blog.delete');

    Route::post('/blog/create', 'BlogController@create')->name('blog.create');

    Route::post('/delete/comment/{id}', 'CommentController@destroy')->name('comment.delete');
    Route::post('/comment/create', 'CommentController@create')->name('comment.create');

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/admin', 'UserController@admin')->name('admin')->middleware('admin');
    
});

Route::get('logout-redirect', 'UserController@logout')->name('logout-redirect');

require __DIR__.'/auth.php';
