<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelFindFilter extends QueryFilter
{
    private $first_click = false;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->set_all_values = true;
    }

    private function dateCheck($value)
    {
        if ($value->start_date && $value->end_date && $this->first_click) {
            return true;
        } else {
            return false;
        }
    }

    private function dateFilter($value)
    {
        if ($this->dateCheck($value)) {
            $this->builder->with('galleries')
                ->select('hotels.id', 'hotels.slug', 'hotels.name', 'hotels.address', 'hotels.description', 'hotels.price', 'hotels.country', 'hotels.city', 'hotels.rating', 'hotels.video', 'hotels.popular')
                ->groupBy('hotels.id', 'hotels.slug', 'hotels.name', 'hotels.address', 'hotels.description', 'hotels.price', 'hotels.country', 'hotels.city', 'hotels.rating', 'hotels.video', 'hotels.popular')
                ->leftJoin('available_rooms', 'hotels.id', '=', 'available_rooms.hotel_id')
                ->leftJoin('bookings', 'available_rooms.id', '=', 'bookings.available_room_id')
                ->where(function ($query) use ($value) {
                    $query->whereDate('start_date', '<', Carbon::parse($value->start_date))
                        ->whereDate('end_date', '<', Carbon::parse($value->end_date));
                })
                ->orWhere(function ($query) use ($value) {
                    $query->whereDate('start_date', '>', Carbon::parse($value->start_date))
                        ->whereDate('end_date', '>', Carbon::parse($value->end_date));
                })->orWhereNull('bookings.available_room_id');
        }
    }

    public function start_date($value)
    {
        $this->dateFilter($value);
        $this->first_click = true;
    }

    public function end_date($value)
    {
        $this->dateFilter($value);
        $this->first_click = true;
    }

    public function country($value)
    {
        $this->builder->with('galleries')->where('country', 'LIKE', "%$value->country%");
    }

    public function city($value)
    {
        $this->builder->with('galleries')->where('city', 'LIKE', "%$value->city%");
    }

    public function price_start($value)
    {
        $this->builder->with('galleries')->where('price', '>=', $value->price_start);
    }

    public function price_end($value)
    {
        $this->builder->with('galleries')->where('price', '<=', $value->price_end);
    }

    public function rating($value){
        $this->builder->with('galleries')->where(function ($query) use ($value){
            foreach ($value->rating as $rating){
                $query->orWhere('rating', '=', $rating);
            }
        });
    }
}