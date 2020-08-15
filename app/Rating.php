<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $fillable = [
        'rating_value',
        'comment',
        'ip',
    ];

    public function ratingable()
    {
        return $this->morphTo();
    }
}
