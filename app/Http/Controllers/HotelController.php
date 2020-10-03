<?php

namespace App\Http\Controllers;

use App\Filters\HotelFilter;
use App\Filters\HotelFindFilter;
use App\Models\Hotel;
use App\Http\Requests\FormAvailability;
use App\Models\AvailabilityHotels;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
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

    public function searchHotels(HotelFilter $request)
    {
        $hotels = Hotel::filter($request)->paginate(3, ['hotels.id']);

        return view('hotel.hotels', ['hotels' => $hotels]);
    }

    public function filterHotels(HotelFindFilter $request)
    {
        $hotels = Hotel::filter($request)->paginate(3);

        if (Request::ajax()) {
            $returnHTML = view('hotel.hotels_loop')->with('hotels', $hotels)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('hotel.hotels', ['hotels' => $hotels]);
        }
    }
}
