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

Route::get('/','Article\ArticleController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/articles','Article\ArticleController@index');
Route::get('/articles/{id}','Article\ArticleController@showSingleArticle');


