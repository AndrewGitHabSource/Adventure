<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'ratingable');
    }

    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
