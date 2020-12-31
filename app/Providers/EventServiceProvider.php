<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
        'App\Events\Customer\CustomerLoggedIn' => [
            'App\Listeners\Customer\Auth\CreateDatabaseLog',
            'App\Listeners\Customer\Auth\SendMailLog',
        ],
        'App\Events\Station\StationLoggedIn' => [
            'App\Listeners\Station\Auth\CreateDatabaseLog',
            'App\Listeners\Station\Auth\SendMailLog',
        ],
        'App\Events\Mechanic\MechanicLoggedIn' => [
            'App\Listeners\Mechanic\Auth\CreateDatabaseLog',
            'App\Listeners\Mechanic\Auth\SendMailLog',
        ],
        'App\Events\User\UserRegistered' => [
            'App\Listeners\User\AddDetail',
            'App\Listeners\User\SendEmailConfirmation'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
