<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
