<?php

namespace App\Repository;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Repository\Helper;


class Repository implements RepositoryInterface
{
    private $model = null;
    private $helper = null;

    public function __construct($model)
    {
        $this->model = $model;
        $this->helper = new Helper();
    }

    public function get($slug){
        return $this->model->BySlug($slug);
    }

    public function getAll(){
        return $this->model::paginate(15);
    }

    public function update(){

    }

    public function insert(Request $request, $generateSlug){
        $input = $request->except('_token');

        if ($generateSlug == true){
            $input['slug'] = $this->helper->setSlug($this->model, $input['name']);
        }

        return $this->model::create($input);
    }

    public function delete(){

    }
}

