<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function view(Request $request, $slug)
    {
        $place = Place::bySlug($slug);

        return view('place.single', ['place' => $place]);
    }

    public function placesList(){
        $places = Place::with('ratings')->paginate(3);

        return view('place.places', ['places' => $places]);
    }
}
