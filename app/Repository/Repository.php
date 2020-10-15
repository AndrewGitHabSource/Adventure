<?php

namespace App\Repository;

use App\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    private $model = null;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function get($slug){

    }

    public function getAll(){
        return $this->model::all();
    }

    public function update(){

    }

    public function insert(){

    }

    public function delete(){

    }
}

