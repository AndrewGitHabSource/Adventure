<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'post_category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parent_posts()
    {
        return $this->belongsToMany('App\Post', 'post_post', 'child_id', 'parent_id');
    }

    public function child_posts()
    {
        return $this->belongsToMany('App\Post', 'post_post', 'parent_id', 'child_id');
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug)->first();
    }

    public function scopeSearch($query, $value){
        $query->orWhere('title', 'LIKE', "%$value%")->orWhere('description', 'LIKE', "%$value%")->get();
    }
}
