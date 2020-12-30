<?php

namespace App\Observers;

use App\Models\Facility;

class FacilityObserver
{
    /**
     * Handle the Facility "created" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function created(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "updated" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function updated(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "deleted" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function deleted(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "restored" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function restored(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "force deleted" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function forceDeleted(Facility $facility)
    {
        //
    }
}
