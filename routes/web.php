<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;
//use App\Http\Controllers\User as User;


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
Route::get('/car/{car:slug}', [Controllers\CarController::class, 'view'])->name('car');

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

Route::get('/search-hotels', [Controllers\HotelController::class, 'searchHotels'])->name('search.hotels');

Route::any('/hotels-filter', [Controllers\HotelController::class, 'filterHotels'])->name('filter.hotels');

Route::get('/booking-room/{hotel}/room/{room}', [Controllers\HotelController::class, 'booking'])->name('booking.room');

Route::post('/booking-room', [Controllers\HotelController::class, 'saveBooking'])->name('booking.save');

Route::any('/places-filter', [Controllers\PlaceController::class, 'filterPlaces'])->name('filter.places');

Route::middleware(['auth:sanctum','admin'])->group(function(){
    Route::get('/admin', [Controllers\Admin\MainController::class, 'index']);

    Route::post('/admin/upload-images-editor', [Controllers\Admin\AdminController::class, 'imageEditorUpload'])->name('image.editor.upload');

    Route::post('/admin/upload-hotel-images', [Controllers\Admin\HotelController::class, 'uploadHotelImage'])->name('upload.hotel.images');
    Route::post('/admin/delete-hotel-images', [Controllers\Admin\HotelController::class, 'deleteHotelImage'])->name('delete.hotel.images');

    Route::post('/admin/select-country', [Controllers\Admin\AdminController::class, 'selectCountry'])->name('select.country');
    Route::post('/admin/select-hotel', [Controllers\Admin\AdminController::class, 'selectHotel'])->name('select.hotel');

    Route::resource('admin/hotels', \Admin\HotelController::class);
    Route::resource('admin/countries', \Admin\CountryController::class);
    Route::resource('admin/cities', \Admin\CityController::class);
    Route::resource('admin/flights', \Admin\FlightController::class);
    Route::resource('admin/places', \Admin\PlaceController::class);
    Route::resource('admin/restaurants', \Admin\RestaurantController::class);
    Route::resource('admin/posts', \Admin\PostController::class);
    Route::resource('admin/categories', \Admin\CategoryController::class);
    Route::resource('admin/tags', \Admin\TagController::class);
    Route::resource('admin/pages', \Admin\PageController::class);
    Route::resource('admin/contacts', \Admin\ContactController::class);
    Route::resource('admin/subscribers', \Admin\SubscriberController::class);
    Route::resource('admin/cars', \Admin\CarController::class);
    Route::resource('admin/user_bookings', \Admin\UserBookingController::class);
    Route::resource('admin/users', \Admin\UserController::class);
    Route::resource('admin/groups', \Admin\GroupController::class);
    Route::resource('admin/availability-hotels', \Admin\AvailabilityHotelsController::class);
    Route::resource('admin/hotels.rooms', \Admin\RoomController::class);
    Route::resource('admin/hotels.available-rooms', \Admin\AvailableRoomsController::class);
    Route::resource('admin/available-rooms.bookings', \Admin\BookingController::class);
});

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/dashboard', [Controllers\UserControl\UserController::class, 'index'])->name('dashboard');
    Route::get('/edit-user-post/{id}', [Controllers\UserControl\UserController::class, 'editUserPost'])->name('edit.user.post');
    Route::get('/add-user-post', [Controllers\UserControl\UserController::class, 'create'])->name('create.user.post');

    Route::post('/insert-user-post/', [Controllers\UserControl\UserController::class, 'insertUserPost'])->name('insert.user.post');
    Route::post('/save-user-post/{id}', [Controllers\UserControl\UserController::class, 'saveUserPost'])->name('save.user.post');
    Route::post('/save-user-settings', [Controllers\UserControl\UserController::class, 'saveUserSettings'])->name('save.user.settings');
});
