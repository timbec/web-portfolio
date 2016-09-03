<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Posts/blog
Route::get('/blog', 'PostsController@index');
Route::get('/blog/{slug}', ['as' => 'blog.post', 'uses'=>'PostsController@post']);

//Admin routes
Route::group(['middleware' => 'admin'], function() {

   Route::resource('admin/posts', 'AdminControllers\PostsController');
   Route::resource('admin/categories', 'AdminControllers\CategoriesController');
   Route::resource('admin/media', 'AdminControllers\MediaController');

});
