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
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('/', 'MovieController@index')->name('movie.index');
  Route::get('/search', 'MovieController@search')->name('movie.search');
  Route::get('/review/{id}', 'MovieController@review')->name('movie.review');
  Route::get('/exchange', 'MovieController@exchange')->name('movie.exchange');
});

Route::get('/register', 'MovieController@register')->name('movie.register');
Route::get('/email', 'MovieController@email')->name('movie.email');
Route::get('/login', 'MovieController@login')->name('movie.login');
Route::get('/reset', 'MovieController@reset')->name('movie.reset');
Route::get('/verify', 'MovieController@verify')->name('movie.verify');