<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
