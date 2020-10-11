<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function listHotels(Request $request){
        return view('admin.hotel.list');
    }
}
