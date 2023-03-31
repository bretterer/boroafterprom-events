<?php

namespace App\Listeners;

use App\Events\AttendeeCheckedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAttendeeCheckedInSMS
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
     * @param  \App\Events\AttendeeCheckedIn  $event
     * @return void
     */
    public function handle(AttendeeCheckedIn $event)
    {
        //
    }
}
