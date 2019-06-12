<?php


Route::get('/', function () {
    return view('welcome');
});


// Route::resource('rest', 'RestTestController')->names('restTest');


Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('post', 'PostController')->names('blog.posts');
});


Route::group(['prefix' => 'admin/blog', 'namespace' => 'Blog\Admin'], function () {
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
