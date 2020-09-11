<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}