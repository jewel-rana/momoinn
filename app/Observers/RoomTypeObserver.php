<?php

namespace App\Observers;

use App\Models\RoomType;

class RoomTypeObserver
{
    /**
     * Handle the RoomType "created" event.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return void
     */
    public function created(RoomType $roomType)
    {
        session()->flash('success', 'Room type successfully created');
    }

    /**
     * Handle the RoomType "updated" event.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return void
     */
    public function updated(RoomType $roomType)
    {
        session()->flash('success', 'Room type successfully updated');
    }

    /**
     * Handle the RoomType "deleted" event.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return void
     */
    public function deleted(RoomType $roomType)
    {
        session()->flash('success', 'Room type successfully deleted');
    }

    /**
     * Handle the RoomType "restored" event.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return void
     */
    public function restored(RoomType $roomType)
    {
        session()->flash('success', 'Room type successfully restored');
    }

    /**
     * Handle the RoomType "force deleted" event.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return void
     */
    public function forceDeleted(RoomType $roomType)
    {
        session()->flash('success', 'Room type permanently deleted');
    }
}
