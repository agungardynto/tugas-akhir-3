<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'StaticController@home')->name('home');
Route::get('rooms', 'StaticController@rooms')->name('rooms');
Route::get('contact', 'StaticController@contact')->name('contact');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () { return redirect()->route('dashboard'); });
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('blog', 'BlogController');
    Route::resource('tag', 'TagController');
    Route::resource('room', 'RoomController');
    Route::resource('service', 'ServiceController');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
