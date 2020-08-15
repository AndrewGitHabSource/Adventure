<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function ratings()
    {
        return $this->morphMany('App\Rating', 'ratingable');
    }

    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
