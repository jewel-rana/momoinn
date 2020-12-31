<?php

namespace App\Observers;

use App\Models\Restaurant;

class RestaurantObserver
{
    /**
     * Handle the Restaurant "created" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function created(Restaurant $restaurant)
    {
        session()->flash('success', 'Room & Suites successfully created');
    }

    /**
     * Handle the Restaurant "updated" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function updated(Restaurant $restaurant)
    {
        session()->flash('success', 'Room & Suites successfully updated');
    }

    /**
     * Handle the Restaurant "deleted" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function deleted(Restaurant $restaurant)
    {
        session()->flash('success', 'Room & Suites successfully deleted');
    }

    /**
     * Handle the Restaurant "restored" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function restored(Restaurant $restaurant)
    {
        session()->flash('success', 'Room & Suites successfully restored');
    }

    /**
     * Handle the Restaurant "force deleted" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function forceDeleted(Restaurant $restaurant)
    {
        session()->flash('success', 'Room & Suites permanently deleted');
    }
}
