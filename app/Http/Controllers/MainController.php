<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class MainController extends Controller
{
    public function index(){
        $hotels = Hotel::popular();

        return view('main', ['hotels' => $hotels]);
    }
}
