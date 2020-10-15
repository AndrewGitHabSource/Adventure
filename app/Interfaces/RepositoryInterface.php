<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface RepositoryInterface
{
    public function get($slug);

    public function getAll();

    public function update();

    public function insert();

    public function delete();
}