<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    public function view(Request $request, $slug)
    {
        $place = Place::bySlug($slug);

        return view('place.single', ['place' => $place]);
    }
}
