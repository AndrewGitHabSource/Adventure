<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Car;

class CarFilter extends QueryFilter
{
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