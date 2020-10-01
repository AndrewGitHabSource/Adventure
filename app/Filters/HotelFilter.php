<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelFilter extends QueryFilter
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->set_all_values = true;
    }

    public function start_date($value)
    {
        $this->builder->with('galleries')
            ->select('hotels.id', 'hotels.slug', 'hotels.name', 'hotels.address', 'hotels.description', 'hotels.price', 'hotels.country', 'hotels.city', 'hotels.rating', 'hotels.video', 'hotels.popular')
            ->groupBy('hotels.id', 'hotels.slug', 'hotels.name', 'hotels.address', 'hotels.description', 'hotels.price', 'hotels.country', 'hotels.city', 'hotels.rating', 'hotels.video', 'hotels.popular')
            ->leftJoin('available_rooms', 'hotels.id', '=', 'available_rooms.hotel_id')
            ->leftJoin('bookings', 'available_rooms.id', '=', 'bookings.available_room_id')
            ->where(function($query) use ($value) {
                $query->whereDate('start_date', '<', Carbon::parse($value->start_date))
                    ->whereDate('end_date', '<', Carbon::parse($value->end_date));
            })
            ->orWhere(function($query) use ($value) {
                $query->whereDate('start_date', '>', Carbon::parse($value->start_date))
                    ->whereDate('end_date', '>', Carbon::parse($value->end_date));
            })->orWhereNull('bookings.available_room_id');
    }
}