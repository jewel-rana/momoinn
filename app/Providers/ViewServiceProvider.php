<?php

namespace App\Providers;

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
            '*', 'App\Http\View\Composers\CategoryComposer'
        );
        View::composer(
            '*', 'App\Http\View\Composers\MenuComposer'
        );
        View::composer(
            '*', 'App\Http\View\Composers\RoleComposer'
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
