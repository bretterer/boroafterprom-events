<?php

namespace App\Listeners;

use App\Events\AttendeeCheckedOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAttendeeCheckedOutSMS
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
     * @param  \App\Events\AttendeeCheckedOut  $event
     * @return void
     */
    public function handle(AttendeeCheckedOut $event)
    {
        //
    }
}
