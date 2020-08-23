<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filters\CarFilter;
use App\Http\Requests\SearchCar;
use App\Car;

class CarController extends Controller
{
    public function searchCars(CarFilter $request){
        $cars = Car::filter($request)->get();

        dd($cars);

//        return view('car.cars', ['cars' => $cars]);
    }
}
