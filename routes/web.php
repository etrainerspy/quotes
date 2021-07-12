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

Route::get('/', 'PagesController@home');

Route::get('/quotes', 'PagesController@getQuotes');

Route::get('/quotes/quotd', 'PagesController@quoteByDate');

Route::get('/quotes/random', 'PagesController@random');

Route::get('/quotes/search', 'PagesController@search');