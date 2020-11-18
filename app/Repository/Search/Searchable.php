<?php

namespace App\Repository\Search;

trait Searchable {
    private $searchWhere = false;
    private $searchWhereArray = null;

    public function search($searchValue, $columns, $with = null) {
        if ($with){
            $query = $this->model::query()->with($with);
        }
        else{
            $query = $this->model::query();
        }

        if ($this->searchWhere){
            $query->orWhere($this->searchWhereArray['column'], $this->searchWhereArray['exp'], $this->searchWhereArray['value']);
        }

        foreach($columns as $column){
            $query->where($column, 'LIKE', '%' . $searchValue . '%');
        }

        return $query->paginate(15);
    }

    public function setWhereSearch($column, $value, $exp = '='){
        $this->searchWhere = true;
        $this->searchWhereArray = array('column' => $column, 'exp' => $exp, 'value' => $value);
    }
}