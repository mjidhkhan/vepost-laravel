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

Route::get('/', function(){
	return'start up page';
});
// About Page
Route::get('/about', 'AboutController@index');

// Support Page
Route:: get('/support', 'SupportController@index');


//Features Page
Route::get('/features', 'AboutController@index');

// Download Page
Route::get('/downloads', 'DownloadController@index');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
