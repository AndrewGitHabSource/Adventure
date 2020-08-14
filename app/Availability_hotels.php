<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability_hotels extends Model
{
    public $fillable = [
        'name',
        'email',
        'date_from',
        'date_to',
        'guest_count',
        'children_count',
        'hotel_id' => 'hotel_id'
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
