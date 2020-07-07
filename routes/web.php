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
Route::post('rooms/{slug}', 'StaticController@booking')->name('booking');
Route::get('rooms/{slug}', 'StaticController@droom')->name('detail_room');
Route::get('contact', 'StaticController@contact')->name('contact');
Route::post('contact', 'StaticController@send_message');
Route::post('faq', 'StaticController@faq');

Route::group(['middleware' => ['auth', 'checkadm']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () { return redirect()->route('dashboard_admin'); });
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard_admin');
        Route::resource('blog', 'BlogController');
        Route::resource('tag', 'TagController');
        Route::resource('room', 'RoomController');
        Route::resource('service', 'ServiceController');
        Route::resource('contact', 'ContactController');
        Route::resource('faq', 'FaqController');
    });    
});

Route::group(['middleware' => ['auth', 'checkusr']], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', function() { return redirect()->route('dashboard_user'); });
        Route::get('dashboard', 'UserController@dashboard')->name('dashboard_user');
        Route::get('profile', 'UserController@profile')->name('profile_user');
        Route::patch('profile', 'UserController@update_profile');
    });
});

Auth::routes();

// Route::get('/test', function(){ echo time(). '<br>' .strtotime(now()); });
// Route::get('/home', 'HomeController@index')->name('home');
