<?php

namespace App\Repository\Search;

trait Searchable {
    public function search($searchValue, $columns) {
        $query = $this->model::query();

        foreach($columns as $column){
            $query->orWhere($column, 'LIKE', '%' . $searchValue . '%');
        }

        return $query->paginate(15);
    }
}