<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ARooms()
    {
        return $this->belongsTo('App\Models\ARooms', 'available_room_id');
    }
}
