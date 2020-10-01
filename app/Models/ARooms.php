<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ARooms extends Model
{
    use HasFactory;

    protected $table = 'available_rooms';

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}
