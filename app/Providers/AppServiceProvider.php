<?php

namespace App\Providers;

use App\Models\ARooms;
use App\Models\Hotel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Observers\HotelObserver;
use App\Observers\AroomsObserver;

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
        $paginateCount = 15;
        config(['paginate.paginate_count' => $paginateCount]);

        Paginator::useBootstrap();
        Hotel::observe(HotelObserver::class);
        ARooms::observe(AroomsObserver::class);
    }
}
