<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }
}
