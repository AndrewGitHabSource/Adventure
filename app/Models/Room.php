<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'ratingable');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->firstOrFail();
    }
}
