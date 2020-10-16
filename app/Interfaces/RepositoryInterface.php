<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


interface RepositoryInterface
{
    public function get($id);

    public function getAll();

    public function update(Request $request, $id);

    public function insert(Request $request, $generateSlug);

    public function delete($id);
}