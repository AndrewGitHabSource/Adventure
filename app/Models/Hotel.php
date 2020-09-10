<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;

class Hotel extends Model
{
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }

    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'ratingable');
    }

    public function availability_hotels()
    {
        return $this->hasMany('App\Models\Availability_hotels');
    }

    public function parent_hotels()
    {
        return $this->belongsToMany('App\Models\Hotel', 'hotel_hotel', 'child_id', 'parent_id');
    }

    public function child_hotels()
    {
        return $this->belongsToMany('App\Models\Hotel', 'hotel_hotel', 'parent_id', 'child_id');
    }

    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
