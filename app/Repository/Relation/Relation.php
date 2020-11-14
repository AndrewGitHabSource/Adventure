<?php

namespace App\Repository\Relation;

use Illuminate\Http\Request;
use App\Interfaces\RelationInterface;

class Relation implements RelationInterface
{
    private $model = null;
    private $relation = null;
    private $arrayList = array();
    private $parentModel = null;

    public function __construct($arrayList)
    {
        $this->arrayList = $arrayList;
    }

    public function setParentModel($parentModel)
    {
        $this->parentModel = $parentModel;
    }

    public function setRelation($relation)
    {
        $this->relation = $relation;
    }

    public function insertOneToMany()
    {
        $function = $this->relation;
        $this->parentModel->$function()->createMany($this->arrayList);
    }

    public function associateBelongTo(){
        $function = $this->parentModel;
        $this->relation->$function()->associate($this->arrayList);
        $this->relation->save();
    }

    public function syncManyToMany(){
        $function = $this->parentModel;
        $this->relation->$function()->sync($this->arrayList);
        $this->relation->save();
    }
}