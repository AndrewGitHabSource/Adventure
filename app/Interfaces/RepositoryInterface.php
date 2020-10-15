<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


interface RepositoryInterface
{
    public function get($slug);

    public function getAll();

    public function update();

    public function insert(Request $request, $generateSlug);

    public function delete();
}