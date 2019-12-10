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
Route::get('/ranking', 'MovieController@ranking')->name('movie.ranking');
Route::get('/review/{id}', 'MovieController@review')->name('movie.review');
Route::get('/exchange', 'MovieController@exchange')->name('movie.exchange');
Route::get('/Mypage', 'MovieController@Mypage')->name('movie.Mypage');

Route::get('/changeimage', 'MovieController@ChangeImage')->name('movie.ChangeImage');
Route::post('/changeimage', 'ChangeImageController@ChangeImage')->name('movie.showChangeImage');

Route::get('/review2', 'MovieController@review2')->name('movie.review2');
Route::get('/match', 'MovieController@match')->name('movie.match');
Route::get('/confirm', 'MovieController@confirm')->name('movie.confirm');


// like nemo
Route::post('review/{id}/like', 'MovieController@like')->name('review.like');
Route::post('review/{id}/dislike', 'MovieController@dislike')->name('review.dislike');
Route::get('like/{id}', 'MovieController@rankinglike')->name('ranking.like');
// like nemo
});
