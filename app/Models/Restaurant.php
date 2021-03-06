<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = ['id'];

    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'ratingable');
    }

    public function scopeRecommended($query){
        return $query->where('recommended', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->firstOrFail();
    }
}
