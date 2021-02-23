<?php

namespace App\Observers;

use App\Models\Route;

class RouteObserver
{
    /**
     * Handle the Route "created" event.
     *
     * @param  \App\Models\Route  $route
     * @return void
     */

    public function creating(Route $route)
    {
        $route->isBusyRoute = "Yes";
    }

    public function created(Route $route)
    {
    }

    /**
     * Handle the Route "updated" event.
     *
     * @param  \App\Models\Route  $route
     * @return void
     */
    public function saved(Route $route)
    {

    }

    /**
     * Handle the Route "deleted" event.
     *
     * @param  \App\Models\Route  $route
     * @return void
     */
    public function deleting(Route $route)
    {
        $route->bus()->delete();
        // dd('hello');
    }

    /**
     * Handle the Route "restored" event.
     *
     * @param  \App\Models\Route  $route
     * @return void
     */
    public function restored(Route $route)
    {
        //
    }

    /**
     * Handle the Route "force deleted" event.
     *
     * @param  \App\Models\Route  $route
     * @return void
     */
    public function forceDeleted(Route $route)
    {
        //
    }
}
