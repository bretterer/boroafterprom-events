<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class AttendeeCheckedOut
{
    use Dispatchable, SerializesModels;

    /**
     * The attendee.
     *
     * @var App\Model\Attendee
     */
    public $attendee;

    /**
     * Create a new event instance.
     *
     * @param App\Model\Attendee $attendee
     * @return void
     */
    public function __construct($attendee)
    {
        $this->attendee = $attendee;
    }

}
