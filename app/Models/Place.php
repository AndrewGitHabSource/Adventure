<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = ['id'];

    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'ratingable');
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
