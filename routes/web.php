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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
    
});


