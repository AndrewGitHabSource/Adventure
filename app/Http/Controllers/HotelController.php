<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function view(Request $request, $slug){
        $hotel = Hotel::with('galleries', 'rooms', 'ratings')->bySlug($slug);

        return view('hotel.single', ['hotel' => $hotel]);
    }

    public function hotelsList(){
        $hotels = Hotel::with('galleries', 'rooms', 'ratings')->paginate(3);

        return view('hotel.hotels', ['hotels' => $hotels]);
    }
}
