<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }

    public function ARooms()
    {
        return $this->hasMany('App\Models\ARooms');
    }

    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'ratingable');
    }

    public function availability_hotels()
    {
        return $this->hasMany('App\Models\AvailabilityHotels');
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
        return $query->where('slug', $slug)->firstOrFail();
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
