<?php

namespace App\Listeners\Mechanic\Auth;

use App\Events\Mechanic\MechanicLoggedIn;
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
     * @param  MechanicLoggedIn  $event
     * @return void
     */
    public function handle(MechanicLoggedIn $event)
    {
        //
    }
}
