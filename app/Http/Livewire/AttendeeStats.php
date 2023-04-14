<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendee;

class AttendeeStats extends Component
{
    public $attendees;

    protected $listeners = ['updateStats'];

    public function updateStats()
    {
        $this->mount();
    }

    public function mount()
    {
        $this->attendees = Attendee::with('ticket')->get();
    }

    public function render()
    {
        return view('livewire.attendee-stats');
    }

    public function totalAttendees()
    {
        return $this->attendees->count();
    }

    public function checkedIn()
    {
        $attendeesCheckedIn =  $this->attendees->filter(function($attendee) {
            return $attendee->checked_in != null && $attendee->checked_out == null ;
        });
        return $attendeesCheckedIn->count();
    }

    public function checkedOut()
    {
        $attendeesCheckedOut =  $this->attendees->filter(function($attendee) {
            return $attendee->checked_out != null;
        });
        return $attendeesCheckedOut->count();
    }
}
