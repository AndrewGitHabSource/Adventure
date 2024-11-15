<?php

namespace App\Filters;

use Carbon\Carbon;

class FlightFilter extends QueryFilter
{
    public function from($value)
    {
        $this->builder->where('from', 'LIKE', "%$value%");
    }

    public function where($value)
    {
        $this->builder->where('where', 'LIKE', "%$value%");
    }

    public function date_start($value)
    {
        $this->builder->whereDate('date_start', '=', Carbon::parse($value));
    }

    public function date_end($value)
    {
        $this->builder->whereDate('date_end', '=', Carbon::parse($value));
    }

    public function travelers($value)
    {
        $this->builder->where('travelers', '>', "%$value%");
    }
}