<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }
}
