<?php

namespace App\Listeners;

use App\Events\LogActivity;
use App\Events\AttendeeCheckedOut;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // $sid = config('services.twilio.account_sid');
        // $token = config('services.twilio.auth_token');
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages
        //                 ->create($event->attendee->phone, // to
        //                         [
        //                             "body" => "{$event->attendee->first_name} {$event->attendee->last_name} has left the 2023 Boro Afterprom. They will not be allowed to re-enter the event.",
        //                             "from" => "+19378064759"
        //                         ]
        //                 );

        LogActivity::dispatch("Check Out SMS Sent to {$event->attendee->phone}", 'phone', $event->attendee);
        Log::debug('Check Out Attendee ' . $event->attendee->phone);
    }
}
