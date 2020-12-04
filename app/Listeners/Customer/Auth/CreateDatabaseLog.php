<?php

namespace App\Listeners\Customer\Auth;

use App\Events\Customer\CustomerLoggedIn;
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
     * @param  CustomerLoggedIn  $event
     * @return void
     */
    public function handle(CustomerLoggedIn $event)
    {
        //
    }
}
