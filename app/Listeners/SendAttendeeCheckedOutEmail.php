<?php

namespace App\Listeners;

use App\Events\LogActivity;
use App\Events\AttendeeCheckedOut;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\AttendeeCheckedOut as AttendeeCheckedOutMail;

class SendAttendeeCheckedOutEmail
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
        $test = Mail::to($event->attendee->parent_email)->later(now()->addSeconds(2), new AttendeeCheckedOutMail($event->attendee));
        LogActivity::dispatch("Check Out Email Sent to {$event->attendee->parent_email}", 'email', $event->attendee);
        Log::debug('Check Out Attendee ' . $event->attendee->email, ['queue' => $test]);
    }
}
