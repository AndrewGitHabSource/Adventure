<?php

namespace App\Repository\ARoomRepository;

use App\Interfaces\RepositoryInterface;
use App\Repository\Relation\Relation;
use Illuminate\Http\Request;
use App\Repository\Repository;



class ARoomRepository extends Repository
{
    public function max($field, $hotelId){
        return $this->model::where('hotel_id', '=', $hotelId)->max($field);
    }

    public function getByFloor($floor, $hotelId){
        return $this->model::where('hotel_id', '=', $hotelId)->where('floor', '=', $floor)->get();
    }
}

