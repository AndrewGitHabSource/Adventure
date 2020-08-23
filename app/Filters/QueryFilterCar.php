<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilterCar
{
    protected $builder;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        $this->where($this->filters()['where']);
        $this->period($this->filters()['date_start'], $this->filters()['date_end']);

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }
}