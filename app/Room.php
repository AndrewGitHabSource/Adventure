<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function ratings()
    {
        return $this->morphMany('App\Rating', 'ratingable');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}