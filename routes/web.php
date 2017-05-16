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

// Simply Controll Pages display
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::get('/', 'PagesController@getIndex');
// Controll Page Dada Interact
Route::resource('/post', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
