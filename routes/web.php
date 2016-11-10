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

Route::resource('questions', 'QuestionController');
Route::resource('/tag','TagController');
Route::resource('/answer','AnswerController', ['only' => ['store', 'index']]);
Route::resource('/comment','CommentController');

Route::get('profile/{username}', 'User\UserController@profile');
Route::post('profile', 'User\UserController@updateAvatar')->middleware('auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
		Route::get('login', 'AdminHomeController@getLogin');
		Route::post('login', 'AdminHomeController@postLogin');
		Route::get('loginout', 'AdminHomeController@loginout');

		Route::group(['middleware'=> 'adminAuth'],function(){
				Route::get('/', 'AdminHomeController@index');
				Route::get('questions', 'QuestionController@index');
				Route::put('questions/{question}', 'QuestionController@update')->name('questionAdminUpdate');
				Route::get('questions/{question}/edit', 'QuestionController@edit')->name('questionAdminEdit');
				Route::delete('questions/{question}', 'QuestionController@destroy')->name('questionAdminDelete');
				Route::get('questions/{question}', 'QuestionController@show')->name('questionAdminShow');
				Route::resource('users','UserController', ['only' => ['index', 'edit', 'destroy']]);
	});
});
