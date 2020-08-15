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

Route::get('/', 'MainController@index')->name('main');

Route::get('/hotel/{slug}', 'HotelController@view')->name('hotel');

Route::post('/check-hotel', 'HotelController@checkAvailable')->name('check.available');
Route::post('/hotel-rating', 'HotelController@sendRating')->name('send.hotel.rating');

Route::get('/hotels', 'HotelController@hotelsList')->name('hotels');

Route::get('/place/{slug}', 'PlaceController@view')->name('place');

Route::get('/restaurant/{slug}', 'RestaurantController@view')->name('restaurant');

Route::get('/room/{slug}', 'RoomController@view')->name('room');