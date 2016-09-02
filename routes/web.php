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

// Route::get('home', 'HomeController@index');

Auth::routes();

Route::resource('home', 'HomeController', ['only' => [
	'index'
]]);

Route::resource('', 'MainPageController', ['only' => [
	'index'
]]);

Route::resource('articles', 'ArticleController');

Route::get('profile/{username}', 'User\UserController@profile');
Route::post('profile', 'User\UserController@updateAvatar')->middleware('auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
		Route::get('login', "AdminHomeController@getLogin");
		Route::post('login', "AdminHomeController@postLogin");
		Route::get('loginout', "AdminHomeController@loginout");

		Route::group(['middleware'=> 'adminAuth'],function(){
				Route::get('/', 'AdminHomeController@index');
				Route::resource('articles','ArticleController');
				Route::resource('users','UserController');
	});
});
