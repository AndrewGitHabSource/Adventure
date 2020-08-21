<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Filters\FlightFilter;

class FlightController extends Controller
{
    public function searchFlights(FlightFilter $request){
        $flights = Flight::filter($request)->get();

        dd($flights);
    }
}
