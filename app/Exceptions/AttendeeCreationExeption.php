<?php

namespace App\Exceptions;

use Exception;

class AttendeeCreationExeption extends Exception
{
    protected $attendeeData;

    public static function for(array $attendeeData, string $attendeeType) {
        $instance = new static(
            "Creation of {$attendeeType} attendee failed"
        );

        $instance->attendeeData = $attendeeData;
        return $instance;
    }
    /**
     * Get the exception's context information.
     *
     * @return array<string, mixed>
     */
    public function context(): array
    {
        return ['attendeeData' => $this->attendeeData];
    }
}
