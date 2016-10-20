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

Route::get('love', 'VoteController@getLove');
Route::get('unlove', 'VoteController@getUnLove');
Route::post('love', 'VoteController@love')->name('love')->middleware('auth');
Route::post('unlove', 'VoteController@unLove')->name('unlove')->middleware('auth');

Route::resource('articles', 'ArticleController');
Route::resource('/tag','TagController');

Route::get('profile/{username}', 'User\UserController@profile');
Route::post('profile', 'User\UserController@updateAvatar')->middleware('auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
		Route::get('login', 'AdminHomeController@getLogin');
		Route::post('login', 'AdminHomeController@postLogin');
		Route::get('loginout', 'AdminHomeController@loginout');

		Route::group(['middleware'=> 'adminAuth'],function(){
				Route::get('/', 'AdminHomeController@index');
				Route::get('articles', 'ArticleController@index');
				Route::put('articles/{article}', 'ArticleController@update')->name('articleAdminUpdate');
				Route::get('articles/{article}/edit', 'ArticleController@edit')->name('articleAdminEdit');
				Route::delete('articles/{article}', 'ArticleController@destroy')->name('articleAdminDelete');
				Route::get('articles/{article}', 'ArticleController@show')->name('articleAdminShow');
				Route::resource('users','UserController', ['only' => ['index', 'edit', 'destroy']]);
	});
});
