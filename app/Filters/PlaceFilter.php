<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceFilter extends QueryFilter
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function country($value)
    {
        $this->builder->where('country', 'LIKE', "%$value%");
    }

    public function city($value)
    {
        $this->builder->where('city', 'LIKE', "%$value%");
    }

    public function price_start($value)
    {
        $this->builder->where('price', '>=', $value);
    }

    public function price_end($value)
    {
        $this->builder->where('price', '<=', $value);
    }

    public function rating($value){
        $this->builder->where(function ($query) use ($value){
            foreach ($value as $rating){
                $query->orWhere('rating', '=', $rating);
            }
        });
    }
}