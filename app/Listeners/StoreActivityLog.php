<?php

namespace App\Listeners;

use App\Models\Activity;
use App\Events\LogActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreActivityLog
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
     * @param  \App\Events\LogActivity  $event
     * @return void
     */
    public function handle(LogActivity $event)
    {
        Activity::create([
            'message' => $event->message,
            'icon' => $event->icon,
            'attendee_id' => $event->attendee->id
        ]);
    }
}
