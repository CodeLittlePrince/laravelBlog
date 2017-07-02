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
Route::get('/', 'PagesController@getIndex')->name('home');
// Controll Page Dada Interact
Route::resource('/post', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login'); // name的作用其实就是 action中可以直接用{{ route('admin.login') }}
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard'); // 注意：这句最好在/admin/login这两句的后面，不然，每次调用/admin/login，路由都会call一次/admin
	Route::resource('/tag', 'TagController');
	Route::get('/article', 'AdminController@article');
});

