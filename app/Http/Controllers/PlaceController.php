<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Filters\PlaceFilter;
use Illuminate\Support\Facades\Request as RequestFacade;

class PlaceController extends Controller
{
    public function view(Request $request, $slug)
    {
        $place = Place::bySlug($slug);

        return view('place.single', ['place' => $place]);
    }

    public function placesList()
    {
        $places = Place::with('ratings')->paginate(3);

        return view('place.places', ['places' => $places]);
    }

    public function filterPlaces(PlaceFilter $request)
    {
        $places = Place::filter($request)->paginate(3);

        if (RequestFacade::ajax()) {
            $returnHTML = view('place.places_loop')->with('places', $places)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('place.places', ['places' => $places]);
        }
    }
}
