<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filters\CarFilter;
use App\Http\Requests\SearchCar;
use App\Models\Car;

class CarController extends Controller
{
    public function searchCars(CarFilter $request){
        $cars = Car::filter($request)->paginate(3);

        return view('car.cars', ['cars' => $cars]);
    }

    public function view(Car $car){
        return view('car.single', ['car' => $car]);
    }
}
