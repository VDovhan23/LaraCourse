<?php


Route::get('/', function () {
    return view('welcome');
});


// Route::resource('rest', 'RestTestController')->names('restTest');
Route::group(['namespace'=>'Blog', 'prefix' => 'blog'], function () {
    Route::resource('post', 'PostController')->names('blog.posts');
});


