<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function Post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
