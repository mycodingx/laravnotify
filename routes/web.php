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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/message', 'SiteController@message')->name('message');
Route::get('/message/{id}', 'HomeController@showMessage')->name('message.show');
Route::get('/markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
});

