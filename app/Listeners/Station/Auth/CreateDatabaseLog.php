<?php

namespace App\Listeners\Station\Auth;

use App\Events\Station\StationLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateDatabaseLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StationLoggedIn  $event
     * @return void
     */
    public function handle(StationLoggedIn $event)
    {
        //
    }
}
