<?php

namespace App\Providers;

use App\Models\Bus;
use App\Models\Route;
use App\Observers\BusObserver;
use App\Observers\RouteObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Route::observe(RouteObserver::class);
        Bus::observe(BusObserver::class);
    }
}
