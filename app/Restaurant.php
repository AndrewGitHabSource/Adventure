<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function scopeRecommended($query){
        return $query->where('recommended', true)->take(4)->get();
    }
}
