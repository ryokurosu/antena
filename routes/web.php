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

Route::get('/', 'ArticleController@index')->name('article');
Route::get('/article/list/{id}', 'ArticleController@index')->name('article.list');
Route::get('/article/{id}', 'ArticleController@page')->name('article.page');
Route::get('/word/{id}', 'ArticleController@word')->name('article.word');
Route::get('/index.amp', 'ArticleController@index')->name('amp.article');
Route::get('/article/list/{id}.amp', 'ArticleController@index')->name('amp.article.list');
Route::get('/article/{id}.amp', 'ArticleController@page')->name('amp.article.page');
Route::get('/word/{id}.amp', 'ArticleController@word')->name('amp.article.word');

Route::get('/sitemap.xml','SitemapController@index');
Route::get('/0/sitemap.xml','SitemapController@top');
Route::get('/{id}/sitemap.xml','SitemapController@article');
Auth::routes();
Route::feeds();