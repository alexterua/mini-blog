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

Route::get('/', 'ArticleController@index')->name('index');
Route::get('/article/create', 'ArticleController@create')->name('article.create');
Route::post('/article/store', 'ArticleController@store')->name('article.store');
Route::get('/article/{id}', 'ArticleController@show')->name('article.show');
