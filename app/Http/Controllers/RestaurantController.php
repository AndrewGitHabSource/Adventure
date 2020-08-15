<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function view(Request $request, $slug)
    {
        $restaurant = Restaurant::bySlug($slug);

        return view('restaurant.single', ['restaurant' => $restaurant]);
    }
}
