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

//Auth::routes();
Auth::routes(['verify' => true]);

// Landing Page
Route::get('/home', 'LandingPage@index')->name('landingPage');
Route::get('/', 'LandingPage@index')->name('landingPage');
// About Page
Route::get('/about', 'AboutController@index')->name('about');

// Support Page
Route:: get('/support', 'SupportController@index')->name('support');


//Features Page
Route::get('/features', 'FeaturesController@index')->name('features');

// Download Page
Route::get('/downloads', 'DownloadController@index')->name('downloads');

// POD Page
Route::get('/pod', 'PodController@index')->name('pod');
Route::get('/downloadPDF','PodController@downloadPDF');
