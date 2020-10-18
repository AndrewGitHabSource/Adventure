<?php

namespace App\Observers;

use App\Models\ARooms;

class AroomsObserver
{
    /**
     * Handle the a rooms "created" event.
     *
     * @param  \App\Models\ARooms  $aRooms
     * @return void
     */
    public function created(ARooms $aRooms)
    {
        //
    }

    /**
     * Handle the a rooms "updated" event.
     *
     * @param  \App\Models\ARooms  $aRooms
     * @return void
     */
    public function updated(ARooms $aRooms)
    {
        //
    }

    /**
     * Handle the a rooms "deleted" event.
     *
     * @param  \App\Models\ARooms  $aRooms
     * @return void
     */
    public function deleting(ARooms $aRooms)
    {
        dd(11);
        $aRooms->bookings()->delete();
    }

    /**
     * Handle the a rooms "restored" event.
     *
     * @param  \App\Models\ARooms  $aRooms
     * @return void
     */
    public function restored(ARooms $aRooms)
    {
        //
    }

    /**
     * Handle the a rooms "force deleted" event.
     *
     * @param  \App\Models\ARooms  $aRooms
     * @return void
     */
    public function forceDeleted(ARooms $aRooms)
    {
        //
    }
}
