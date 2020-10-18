<?php

namespace App\Interfaces;

use Illuminate\Http\Request;


interface RelationInterface
{
    public function setRelation($relation);

    public function setParentModel($parentModel);

    public function insertOneToMany();
}