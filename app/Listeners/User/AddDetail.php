<?php

namespace App\Listeners\User;

use App\Events\User\UserRegistered;
use App\Models\CustomerDetail;
use App\Models\MechanicDetail;
use App\Models\StationDetail;
use App\Models\UserDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddDetail
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        switch( $user->role_id ) {
            default:
                $detail = new UserDetail();
                break;

            case 4:
                $detail = new CustomerDetail();
                break;

            case 5:
                $detail = new StationDetail();
                break;

            case 6:
                $detail = new MechanicDetail();
                break;
        }

        $detail->user_id = $user->id;
        $detail->save();
    }
}
