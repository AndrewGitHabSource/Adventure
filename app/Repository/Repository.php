<?php

namespace App\Repository;

use App\Interfaces\RepositoryInterface;
use App\Repository\Relation\Relation;
use Illuminate\Http\Request;
use App\Repository\Helper;
use App\Repository\Search\Searchable;
use App\Repository\Image\ImageUpload;


class Repository implements RepositoryInterface
{
    use Searchable;
    use ImageUpload;

    private $model = null;
    private $helper = null;

    public function __construct($model)
    {
        $this->model = $model;
        $this->helper = new Helper();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function get($id)
    {
        return $this->model::where('id', '=', $id)->firstOrFail();
    }

    public function getBySlug($slug)
    {
        return $this->model::BySlug($slug);
    }

    public function getAll()
    {
        return $this->model::paginate(15);
    }

    public function where($key, $exp, $value)
    {
        return $this->model::where($key, $exp, $value)->get();
    }

    public function update($request, $id)
    {
        return $this->model::where('id', $id)->update($request);
    }

    public function insert($request, $generateSlug)
    {
        if ($generateSlug == true) {
            $request['slug'] = $this->helper->setSlug($this->model, $request['name']);
        }

        return $this->model::create($request);
    }

    public function delete($id)
    {
        return $this->model::find($id)->delete();
    }

    public function insertRelationOneToMany($childModel, $parentModel, $arrayList)
    {
        $relation = new Relation($arrayList);

        $relation->setParentModel($parentModel);
        $relation->setRelation($childModel);
        $relation->insertOneToMany();
    }

    public function associate($childModel, $parentModel, $arrayList)
    {
        $relation = new Relation($arrayList);

        $relation->setParentModel($parentModel);
        $relation->setRelation($childModel);
        $relation->associateBelongTo();
    }

    public function sync($childModel, $parentModel, $arrayList){
        $relation = new Relation($arrayList);

        $relation->setParentModel($parentModel);
        $relation->setRelation($childModel);
        $relation->syncManyToMany();
    }

    public function checkboxHandler($input, $value)
    {
        if (isset($input[$value]) && $input[$value] == 'on') {
            $input[$value] = true;
        } else {
            $input[$value] = false;
        }

        return $input;
    }
}

