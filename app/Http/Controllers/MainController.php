<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Place;
use App\Models\Restaurant;


class MainController extends Controller
{
    public function index(){
        $hotels = Hotel::popular();
        $places = Place::popular();
        $restaurants = Restaurant::recommended();

        return view('main', ['hotels' => $hotels, 'places' => $places, 'restaurants' => $restaurants]);
    }
}
