<?php

namespace App\Observers;

use App\Models\Bus;
use Exception;
use Illuminate\Support\Facades\Session;

// class DuplicateBusException extends Exception {
//     public function __construct() {
//     }
// }

class BusObserver
{

    /**
     * Handle the Bus "created" event.
     *
     * @param  \App\Models\Bus  $bus
     * @return void
     */
    public function creating(Bus $bus)
    {
        $bus->hasWifi = "Yes";
    }

    /**
     * Handle the Bus "updated" event.
     *
     * @param  \App\Models\Bus  $bus
     * @return void
     */
    public function updating(Bus $bus)
    {

    }

    /**
     * Handle the Bus "deleted" event.
     *
     * @param  \App\Models\Bus  $bus
     * @return void
     */
    public function created(Bus $bus)
    {

    }

    /**
     * Handle the Bus "restored" event.
     *
     * @param  \App\Models\Bus  $bus
     * @return void
     */
    public function restored(Bus $bus)
    {
        //
    }

    /**
     * Handle the Bus "force deleted" event.
     *
     * @param  \App\Models\Bus  $bus
     * @return void
     */
    public function forceDeleted(Bus $bus)
    {
        //
    }
}
