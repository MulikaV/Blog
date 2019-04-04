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


use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::get('/post/{slug}','HomeController@show')->name('post.show');
Route::get('/tag/{slug}','HomeController@tag')->name('tag.show');
Route::get('/category/{slug}','HomeController@category')->name('category.show');
Route::post('/subscribe','SubscribeController@subscribe');
Route::get('/verify/{token}','SubscribeController@verify');

Route::group(['middleware' => 'guest'],function (){
    Route::get('/register','Auth\RegisterController@showRegistrationForm');
    Route::post('/register','Auth\RegisterController@register');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@login');

});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@update');
    Route::post('/comment', 'CommentsController@addComment');
});




Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin'], function (){

	Route::get('/', 'DashboardController@index');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/users', 'UsersController');
	Route::resource('/posts', 'PostsController');
	Route::resource('/subscribers', 'SubscribersController');
	Route::get('/comments', 'CommentsController@index');
	Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
	Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
});


