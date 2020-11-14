<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->firstOrFail();
    }
}
