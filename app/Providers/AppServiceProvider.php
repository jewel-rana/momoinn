<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\RoomType;
use App\Models\User;
use App\Observers\BannerObserver;
use App\Observers\BookingObserver;
use App\Observers\CouponObserver;
use App\Observers\CustomerObserver;
use App\Observers\FacilityObserver;
use App\Observers\GalleryObserver;
use App\Observers\MenuObserver;
use App\Observers\RestaurantObserver;
use App\Observers\RoomTypeObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Banner::observe(BannerObserver::class);
        Booking::observe(BookingObserver::class);
        Coupon::observe(CouponObserver::class);
        Customer::observe(CustomerObserver::class);
        Restaurant::observe(RestaurantObserver::class);
        Facility::observe(FacilityObserver::class);
        Gallery::observe(GalleryObserver::class);
        Menu::observe(MenuObserver::class);
        User::observe(UserObserver::class);
        RoomType::observe(RoomTypeObserver::class);
        Paginator::useBootstrap();
    }
}
