<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ARooms extends Model
{
    use HasFactory;

    protected $table = 'available_rooms';

    protected $fillable = ['hotel_id'];

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking', 'available_room_id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}
