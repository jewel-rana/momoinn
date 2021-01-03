<?php

namespace App\Providers;

use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\RoleComposer;
use App\Http\View\Composers\RoomTypeComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(
            '*', CategoryComposer::class
        );
        View::composer(
            '*', MenuComposer::class
        );
        View::composer(
            '*', RoleComposer::class
        );
        View::composer(
            '*', RoomTypeComposer::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
