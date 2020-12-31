<?php

namespace App\Observers;

use App\Models\Coupon;

class CouponObserver
{
    /**
     * Handle the Coupon "created" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function created(Coupon $coupon)
    {
        session()->flash('success', 'Coupon successfully created');
    }

    /**
     * Handle the Coupon "updated" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function updated(Coupon $coupon)
    {
        session()->flash('success', 'Coupon successfully updated');
    }

    /**
     * Handle the Coupon "deleted" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function deleted(Coupon $coupon)
    {
        session()->flash('success', 'Coupon successfully deleted');
    }

    /**
     * Handle the Coupon "restored" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function restored(Coupon $coupon)
    {
        session()->flash('success', 'Coupon successfully restored');
    }

    /**
     * Handle the Coupon "force deleted" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function forceDeleted(Coupon $coupon)
    {
        session()->flash('success', 'Coupon permanently deleted');
    }
}
