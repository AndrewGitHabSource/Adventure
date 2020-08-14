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

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function ratings()
    {
        return $this->morphMany('App\Rating', 'ratingable');
    }

    public function availability_hotels()
    {
        return $this->hasMany('App\Availability_hotels');
    }

    public function parent_hotels()
    {
        return $this->belongsToMany('App\Hotel', 'hotel_hotel', 'child_id', 'parent_id');
    }

    public function child_hotels()
    {
        return $this->belongsToMany('App\Hotel', 'hotel_hotel', 'parent_id', 'child_id');
    }

    public function scopePopular($query){
        return $query->where('popular', true)->take(4)->get();
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }
}
