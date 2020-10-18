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

    public function get($id){
        return $this->model::where('id', '=', $id)->first();
    }

    public function getBySlug($slug){
        return $this->model::BySlug($slug);
    }

    public function getAll(){
        return $this->model::paginate(15);
    }

    public function update(Request $request, $id){
        $input = $request->except('_token', '_method', 'files');

        return $this->model::where('id', $id)->update($input);
    }

    public function insert(Request $request, $generateSlug){
        $input = $request->except('_token', '_method', 'files');

        if ($generateSlug == true){
            $input['slug'] = $this->helper->setSlug($this->model, $input['name']);
        }

        return $this->model::create($input);
    }

    public function delete($id){
        return $this->model::find($id)->delete();
    }

    public function insertRelationOneToMany($childModel, $parentModel, $arrayList){
        $relation = new Relation($arrayList);

        $relation->setParentModel($parentModel);
        $relation->setRelation($childModel);
        $relation->insertOneToMany();
    }
}

