<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class UserBooking extends Model
{
    use HasFactory;

    protected $table = 'user_bookings';

    protected $guarded = ['id'];

    public function hotel(){
        return $this->belongsTo('App\Models\Hotel');
    }
}
