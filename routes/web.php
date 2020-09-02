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

Route::get('/', 'PostController@all_home_posts')->name('blog_home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Home-post routes
Route::get('/post/{id}', 'PostController@home_post')->name('home.post');

// Route::post('/search{request}', 'PostController@search')->name('search');
Route::get('/category/{id}', 'PostController@cat_post')->name('category.post');

Route::group(['middleware'=>'admin'], function(){


    // USER IMPLENTATION ROUTES
        
    Route::resource('/admin/users/', 'AdminUserController');

    Route::get('/admin/users/{id}/edit', 'AdminUserController@edit');

    Route::put('/admin/users/{id}', 'AdminUserController@update');

    Route::get('/admin/users/{id}', 'AdminUserController@show');

    Route::delete('/admin/users/{id}', 'AdminUserController@destroy');

    // 

    Route::view('/admin', 'admin.index');


    // pOST ROUTES
    Route::resource('/admin/posts', 'PostController');

    Route::get('/admin/posts/{id}/edit', 'PostController@edit');

    Route::put('/admin/posts/{id}', 'PostController@update');

    Route::get('/admin/posts/{id}', 'PostController@show');

    Route::delete('/admin/posts/{id}', 'PostController@destroy');


    // Category Routes
    Route::resource('/admin/category', 'CatController');

    Route::get('/admin/category/{id}/edit', 'CatController@edit');

    Route::delete('/admin/category/{id}', 'CatController@destroy');

    Route::put('/admin/category/{id}', 'CatController@update');


    //Image Routes
    Route::resource('/admin/media', 'MediaController');
    Route::delete('/admin/media/{id}', 'MediaController@destroy');


    // helping for multi-media deletion
    Route::delete('/admin/delete/media', 'MediaController@delete_medias');


    // Comment routes
    Route::resource('/admin/comments', 'PostCommentController');
    Route::delete('/admin/comment/{id}', 'PostCommentController@destroy');
    Route::put('/admin/comment/{id}', 'PostCommentController@update');

    // Replies routes
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
    Route::get('/admin/comment/replies/{id}', 'CommentRepliesController@show');

    Route::get('/admin/comment/show_replies/{id}', 'PostCommentController@replies')->name('comment.replies');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
