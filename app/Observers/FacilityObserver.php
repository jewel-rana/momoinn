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
        session()->flash('success', ucfirst(str_replace('-', ' ', $facility->type)) . ' successfully created');
    }

    /**
     * Handle the Facility "updated" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function updated(Facility $facility)
    {
        session()->flash('success', ucfirst(str_replace('-', ' ', $facility->type)) . ' successfully updated');
    }

    /**
     * Handle the Facility "deleted" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function deleted(Facility $facility)
    {
        session()->flash('success', ucfirst(str_replace('-', ' ', $facility->type)) . ' successfully deleted');
    }

    /**
     * Handle the Facility "restored" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function restored(Facility $facility)
    {
        session()->flash('success', ucfirst(str_replace('-', ' ', $facility->type)) . ' successfully restored');
    }

    /**
     * Handle the Facility "force deleted" event.
     *
     * @param  \App\Models\Facility  $facility
     * @return void
     */
    public function forceDeleted(Facility $facility)
    {
        session()->flash('success', ucfirst(str_replace('-', ' ', $facility->type)) . ' permanently deleted');
    }
}
