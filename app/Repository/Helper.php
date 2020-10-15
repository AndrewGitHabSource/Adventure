<?php

namespace App\Repository;
use Illuminate\Http\Request;


class Helper
{
    public function setSlug($model, $value)
    {
        if ($model::whereSlug($slug = str_slug($value))->exists()) {
            $slug = $this->incrementSlug($model, $slug);
        }

        return $slug;
    }

    public function incrementSlug($model, $slug)
    {
        $original = $slug;
        $count = 1;

        while ($model::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}

