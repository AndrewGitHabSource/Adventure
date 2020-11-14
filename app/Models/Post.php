<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'post_category');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function parent_posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_post', 'child_id', 'parent_id');
    }

    public function child_posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_post', 'parent_id', 'child_id');
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->firstOrFail();
    }

    public function scopeSearch($query, $value){
        $query->orWhere('title', 'LIKE', "%$value%")->orWhere('description', 'LIKE', "%$value%")->get();
    }
}
