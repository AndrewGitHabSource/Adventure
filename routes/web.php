<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

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

Route::get('/', [Controllers\MainController::class, 'index'])->name('main');

Route::get('/hotel/{slug}', [Controllers\HotelController::class, 'view'])->name('hotel');

Route::post('/check-hotel', [Controllers\HotelController::class, 'checkAvailable'])->name('check.available');

Route::post('/send-rating', [Controllers\CommonController::class, 'sendRating'])->name('send.rating');

Route::get('/hotels', [Controllers\HotelController::class, 'hotelsList'])->name('hotels');

Route::get('/blog', [Controllers\PostController::class, 'postsList'])->name('blog');

Route::get('/places', [Controllers\PlaceController::class, 'placesList'])->name('places');

Route::get('/place/{slug}', [Controllers\PlaceController::class, 'view'])->name('place');
Route::get('/restaurant/{slug}', [Controllers\RestaurantController::class, 'view'])->name('restaurant');
Route::get('/room/{slug}', [Controllers\RoomController::class, 'view'])->name('room');

Route::get('/post/{slug}', [Controllers\PostController::class, 'view'])->name('post');
Route::get('/page/{slug}', [Controllers\PageController::class, 'view'])->name('page');

Route::get('/search-post', [Controllers\PostController::class, 'search'])->name('search.post');

Route::get('/category/{slug}', [Controllers\PostController::class, 'category'])->name('category');

Route::get('/tag/{slug}', [Controllers\PostController::class, 'tag'])->name('tag');

Route::post('/send-comment', [Controllers\PostController::class, 'saveComment'])->name('send.comment');

Route::get('/contacts', [Controllers\ContactController::class, 'index'])->name('contacts');

Route::post('/contacts', [Controllers\ContactController::class, 'sendMessage'])->name('form.contacts');

Route::post('/subscribe', [Controllers\CommonController::class, 'subscribe'])->name('form.subscribe');

// Filters

Route::get('/search-flights', [Controllers\FlightController::class, 'searchFlights'])->name('search.flights');

Route::get('/search-cars', [Controllers\CarController::class, 'searchCars'])->name('search.cars');