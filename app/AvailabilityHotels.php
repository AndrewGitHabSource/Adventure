<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailabilityHotels extends Model
{
    protected $table = 'availability_hotels';

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
