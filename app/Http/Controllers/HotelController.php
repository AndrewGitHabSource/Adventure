<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\FormAvailability;
use App\AvailabilityHotels;
use App\Rating;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HotelController extends Controller
{
    public function view(Request $request, $slug)
    {
        $hotel = Hotel::with('galleries', 'rooms', 'ratings')->bySlug($slug);

        return view('hotel.single', ['hotel' => $hotel]);
    }

    public function hotelsList()
    {
        $hotels = Hotel::with('galleries', 'rooms', 'ratings')->paginate(3);

        return view('hotel.hotels', ['hotels' => $hotels]);
    }

    public function checkAvailable(FormAvailability $request)
    {
        $date_from = Carbon::createFromFormat('m/d/Y', $request->date_from)->format('Y-m-d');
        $date_to = Carbon::createFromFormat('m/d/Y', $request->date_to)->format('Y-m-d');

        AvailabilityHotels::create([
            'children_count' => $request->children_count,
            'guest_count' => $request->guest_count,
            'date_to' => $date_to,
            'date_from' => $date_from,
            'email' => $request->email,
            'name' => $request->name,
            'hotel_id' => $request->hotel_id
        ]);

        return redirect()->back()->with('success_message', 'Your request has been sent! We will contact with you.');
    }

    public function sendRating(Request $request)
    {
        $hotel = Hotel::bySlug($request->hotel_slug);

        $input = $request->except('hotel_slug');
        $input['ip'] = $request->ip();

        $hotel->ratings()->create($input);

        return redirect()->back()->with('success_message', 'Your rating has been sent!');
    }
}
