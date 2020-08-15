<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function view(Request $request, $slug)
    {
        $room = Room::bySlug($slug);

        return view('room.single', ['room' => $room]);
    }
}
