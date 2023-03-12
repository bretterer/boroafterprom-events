<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendee;

class AttendeeDetailModal extends Component
{
    public ?Attendee $attendee;

    protected $listeners = ['setCurrentAttendee'];

    public function mount(Attendee $attendee)
    {

        try {
            $this->attendee = $attendee->all()->firstOrFail();
            // dd($this->attendee);
        } catch (ItemNotFoundException $infe) {
            abort(404, $infe->getMessage());
        }
    }

    public function setCurrentAttendee(Attendee $attendee)
    {
        $this->attendee = $attendee;
        $this->emit('currentAttendeeSet');
    }

    public function render()
    {
        return view('livewire.attendee-detail-modal');
    }
}
