<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}
