<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class LogActivity
{
    use Dispatchable, SerializesModels;

    /**
     * Message To Log
     *
     * @var string
     */
    public $message;


    /**
     * Icon for activity
     *
     * @var string
     */
    public $icon;

    /**
     * The attendee of activity
     *
     * @var App\Models\Attendee
     */
    public $attendee;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message = "", $icon = "", $attendee)
    {
        $this->message = $message;
        $this->icon = $icon;
        $this->attendee = $attendee;
    }

}
