<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function ratings()
    {
        return $this->morphMany('App\Rating', 'ratingable');
    }

    public function scopeRecommended($query){
        return $query->where('recommended', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
