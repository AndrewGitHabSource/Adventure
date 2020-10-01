<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Interfaces\FilterInterface;

abstract class QueryFilter implements FilterInterface
{
    protected $builder;
    protected $request;
    public $set_all_values = false;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                if ($this->set_all_values == true){
                    $this->$filter($this->request);
                }
                else{
                    if ($value !== null) {
                        $this->$filter($value);
                    }
                }
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }
}