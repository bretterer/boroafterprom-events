<?php

namespace App\Listeners;

use Twilio\Rest\Client;
use App\Events\LogActivity;
use App\Events\AttendeeCheckedIn;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // $sid = config('services.twilio.account_sid');
        // $token = config('services.twilio.auth_token');
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages
        //                 ->create($event->attendee->phone, // to
        //                         [
        //                             "body" => "{$event->attendee->first_name} {$event->attendee->last_name} has checked into the 2023 Boro Afterprom. We will message you again if they leave early.",
        //                             "from" => "+19378064759"
        //                         ]
        //                 );
        LogActivity::dispatch("Check In SMS Sent to {$event->attendee->phone}", 'phone', $event->attendee);
        Log::debug('Check In Attendee ' . $event->attendee->phone);
    }
}
