<?php

App::bind('PostRepositoryInterface', 'EloquentPostRepository');
App::bind('CommentRepositoryInterface', 'EloquentCommentRepository');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//group of routes that will belong to APIv1
Route::group(array('prefix' => 'v1'), function()
{
    Route::resource('posts', 'PostsController');
    Route::resource('posts.comments', 'PostsCommentsController');

  	
});
