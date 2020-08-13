<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function view(Request $request, $slug){
        $hotel = Hotel::with('galleries', 'rooms')->bySlug($slug);

        return view('hotel.single', ['hotel' => $hotel]);
    }
}
