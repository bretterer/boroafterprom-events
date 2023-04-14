<?php

namespace App\Listeners;

use Twilio\Rest\Client;
use App\Events\LogActivity;
use App\Events\AttendeeCheckedIn;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\AttendeeCheckedIn as AttendeeCheckedInMail;

class SendAttendeeCheckedInEmail
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
        Mail::to($event->attendee->parent_email)->later(now()->addMinutes(2), new AttendeeCheckedInMail($event->attendee));
        LogActivity::dispatch("Check In Email Sent to {$event->attendee->parent_email}", 'email', $event->attendee);
        Log::debug('Check In Attendee ' . $event->attendee->phone);
    }
}
