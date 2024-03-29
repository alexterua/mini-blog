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
Route::get('/article/show/{id}', 'ArticleController@show')->name('article.show');
Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
Route::post('/article/store', 'ArticleController@store')->name('article.store');
Route::patch('/article/show/{id}', 'ArticleController@update')->name('article.update');
Route::delete('/{id}', 'ArticleController@destroy')->name('article.destroy');
