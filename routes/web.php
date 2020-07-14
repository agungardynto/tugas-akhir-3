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
Route::get('rooms/{slug}', 'StaticController@droom')->name('detail_room');
Route::post('rooms/{slug}', 'StaticController@booking')->name('booking');
Route::get('blog', 'StaticController@blog')->name('blog');
Route::get('blog/{slug}', 'StaticController@dblog')->name('detail_blog');
Route::get('contact', 'StaticController@contact')->name('contact');
Route::post('contact', 'StaticController@send_message');
Route::post('faq', 'StaticController@faq');
Route::post('likes', 'StaticController@likes');

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
        Route::group(['prefix' => 'booking'], function () {
            Route::get('/', 'BookingController@index')->name('booking.index');
            Route::post('check', 'BookingController@show')->name('booking.show');
            Route::patch('{code}', 'BookingController@update')->name('booking.update');
        });
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

// Route::get('/test', function(){ echo time(). '<br>' .strtotime(now()). '<br>' .date(now()); });
// Route::get('/barcode', function() { 
//     echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG('412398192', 'QRCODE', 5,5) . '" alt="barcode"   />'; 
//     echo DNS2D::getBarcodeHTML('4445645656', 'QRCODE');
//     echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('443', 'C39+',3,33,array(1,1,1), true) . '" alt="barcode"   />';
//     echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(205,21,24)) . '" alt="barcode"   />';
// });
// Route::get('/home', 'HomeController@index')->name('home');
