<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;

class Hotel extends Model
{
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->get();
    }
}
