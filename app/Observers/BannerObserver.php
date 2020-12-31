<?php

namespace App\Observers;

use App\Models\Banner;

class BannerObserver
{
    /**
     * Handle the Banner "created" event.
     *
     * @param  \App\Models\Banner  $banner
     * @return void
     */
    public function created(Banner $banner)
    {
        session()->flash('success', 'Banner successfully created');
    }

    /**
     * Handle the Banner "updated" event.
     *
     * @param  \App\Models\Banner  $banner
     * @return void
     */
    public function updated(Banner $banner)
    {
        unlink(public_path($banner->attachment));
        unlink(public_path($banner->thumbnail));
        session()->flash('success', 'Banner successfully updated');
    }

    /**
     * Handle the Banner "deleted" event.
     *
     * @param  \App\Models\Banner  $banner
     * @return void
     */
    public function deleted(Banner $banner)
    {
        unlink(public_path($banner->attachment));
        unlink(public_path($banner->thumbnail));
        session()->flash('success', 'Banner successfully deleted');
    }

    /**
     * Handle the Banner "restored" event.
     *
     * @param  \App\Models\Banner  $banner
     * @return void
     */
    public function restored(Banner $banner)
    {
        session()->flash('success', 'Banner successfully restored');
    }

    /**
     * Handle the Banner "force deleted" event.
     *
     * @param  \App\Models\Banner  $banner
     * @return void
     */
    public function forceDeleted(Banner $banner)
    {
        unlink(public_path($banner->attachment));
        unlink(public_path($banner->thumbnail));
        session()->flash('success', 'Banner permanently deleted');
    }
}
