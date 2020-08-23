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
Route::get('/page/{slug}', 'PageController@view')->name('page');

Route::get('/search-post', 'PostController@search')->name('search.post');

Route::get('/category/{slug}', 'PostController@category')->name('category');

Route::get('/tag/{slug}', 'PostController@tag')->name('tag');

Route::post('/send-comment', 'PostController@saveComment')->name('send.comment');

Route::get('/contacts', 'ContactController@index')->name('contacts');

Route::post('/contacts', 'ContactController@sendMessage')->name('form.contacts');

Route::post('/subscribe', 'CommonController@subscribe')->name('form.subscribe');

// Filters

Route::get('/search-flights', 'FlightController@searchFlights')->name('search.flights');

Route::get('/search-cars', 'CarController@searchCars')->name('search.cars');