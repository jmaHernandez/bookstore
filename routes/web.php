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

Route::get('/', 'WelcomeController@index');
Route::get('/books', 'BookController@index');
Route::get('/authors', 'AuthorController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/books/create', 'BookController@create');
	Route::post('/books/store', 'BookController@store');
	Route::get('/books/show/{book}', 'BookController@show');
	Route::get('/books/edit/{book}', 'BookController@edit');
	Route::put('/books/update/{book}', 'BookController@update');
	Route::delete('/books/delete/{book}', 'BookController@delete');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/authors/create', 'AuthorController@create');
	Route::post('/authors/store', 'AuthorController@store');
	Route::get('/authors/show/{author}', 'AuthorController@show');
	Route::get('/authors/edit/{author}', 'AuthorController@edit');
	Route::put('/authors/update/{author}', 'AuthorController@update');
	Route::delete('/authors/delete/{author}', 'AuthorController@delete');
});

/*
Route::group(['middleware' => 'role'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
});
*/
