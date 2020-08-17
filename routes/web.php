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

Route::post('/send-rating', 'CommonController@sendRating')->name('send.rating');

Route::get('/hotels', 'HotelController@hotelsList')->name('hotels');

Route::get('/blog', 'PostController@postsList')->name('blog');

Route::get('/places', 'PlaceController@placesList')->name('places');

Route::get('/place/{slug}', 'PlaceController@view')->name('place');

Route::get('/restaurant/{slug}', 'RestaurantController@view')->name('restaurant');

Route::get('/room/{slug}', 'RoomController@view')->name('room');

Route::get('/post/{slug}', 'PostController@view')->name('post');

Route::get('/search-post', 'PostController@search')->name('search.post');

Route::get('/category/{slug}', 'PostController@category')->name('category');

Route::get('/tag/{slug}', 'PostController@tag')->name('tag');

Route::post('/send-comment', 'PostController@saveComment')->name('send.comment');
