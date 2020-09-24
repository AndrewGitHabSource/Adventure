<?php

namespace App\Filters;

use Carbon\Carbon;
use App\Http\Requests\SearchCar;

class CarFilter extends QueryFilter
{
    public function __construct(SearchCar $request)
    {
        parent::__construct($request);
    }

    public function where($value)
    {
        $this->builder->where('city', 'LIKE', "%$value%");
    }

    public function date_start($value)
    {
        $this->builder->whereDate('date_end', '<=', Carbon::parse($value));
    }

    public function date_end($value)
    {
        $this->builder->orWhereDate('date_start', '>=', Carbon::parse($value));
    }
}