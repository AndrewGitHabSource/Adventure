<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    protected $fillable = array('*');
    protected $guarded = [];

    public function Post()
    {
        return $this->belongsTo('App\Post');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
