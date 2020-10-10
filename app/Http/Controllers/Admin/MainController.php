<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Filters\CarFilter;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request){
        return view('admin.index');
    }
}
