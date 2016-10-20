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

/* 
路由的语法统一为Route::something,代表着controller里面每个方法的分发

例如: Route::get, Route::put 分别代表get和post方法

如果有命名的或, 例如Route::post()->name(), 代表这赋予这个路由特殊的名字

如果存在中间件, 例如->middleware(), 代表这此路由存在限制

运行命令php artisan route:list 可以通过列表的形式观察到命名以及中间件的效果

特殊的Auth::routes(), Route::resource()
参考文档: 
https://laravel.com/docs/5.3/controllers#restful-naming-resource-routes
http://stackoverflow.com/questions/39196968/laravel-5-3-new-authroutes

*/

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
