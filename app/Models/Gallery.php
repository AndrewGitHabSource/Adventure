<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image'];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}
