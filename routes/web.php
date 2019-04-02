<?php

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




Route::get('/','HomeController@index');
Route::get('/post/{slug}','HomeController@show')->name('post.show');
Route::get('/tag/{slug}','HomeController@tag')->name('tag.show');
Route::get('/category/{slug}','HomeController@category')->name('category.show');

Route::group(['middleware' => 'guest'],function (){
    Route::get('/register','Auth\RegisterController@showRegistrationForm');
    Route::post('/register','Auth\RegisterController@register');
    Route::get('/login','Auth\LoginController@showLoginForm');
    Route::post('/login','Auth\LoginController@login');
});
Route::group(['middleware' => 'auth'],function (){
    Route::get('/logout','Auth\LoginController@logout');
});




Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin'], function (){
	Route::get('/', 'DashboardController@index');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/users', 'UsersController');
	Route::resource('/posts', 'PostsController');
});


