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
Route::group(['middleware' => ['auth']], function ()
{
Route::get('/', 'MovieController@index')->name('movie.index');

//ログイン
Route::get('/search1', 'MovieController@search')->name('movie.search');

Route::get('/search', 'MovieController@searchicon')->name('movie.searchicon');
Route::get('/review/{id}', 'MovieController@review')->name('movie.review');
Route::get('/exchange', 'MovieController@exchange')->name('movie.exchange');
Route::get('/Mypage', 'MovieController@Mypage')->name('movie.Mypage');
Route::get('/register', 'MovieController@register')->name('movie.register');
});
