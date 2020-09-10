<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_category');
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
