<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\ItemNotFoundException;

class EventCheckin extends Component
{
    use WithPagination;

    public $search = '';
    public $ticketsSold = 0;
    public $checkedIn = 0;
    public $checkedOut = 0;
    public ?Student $student;

    public function render()
    {
        $students = Student::with('guest');

        $this->ticketsSold = 0;
        $this->checkedIn = 0;
        $this->checkedOut = 0;

        foreach($students->orderBy('last_name')->get() as $student) {
            $this->ticketsSold++;
            if ( $student->guest ) {
                $this->ticketsSold++;;
            }


            if ( $student->checked_in != null && $student->checked_out == null) {
                $this->checkedIn++;
            }

            if ( $student->checked_in != null && $student->checked_out != null) {
                $this->checkedOut++;
            }

            if ($student->guest) {
                if ( $student->guest->checked_in !== null && $student->guest->checked_out === null) {
                    $this->checkedIn++;
                }

                if ( $student->guest->checked_in !== null && $student->guest->checked_out !== null) {
                    $this->checkedOut++;
                }
            }
        }

        return view('livewire.event-checkin', [
            'students' => $students->where('first_name', 'like', '%'.$this->search.'%')->orWhere('last_name', 'like', '%'.$this->search.'%')->orWhere('id', 'like', $this->search.'%')->orderBy('last_name')->paginate(10),
            'ticketsSold' => 0,
            'checkedIn' => $this->checkedIn,
            'checkedOut' => 0,
        ]);
    }

    public function mount(Student $student)
    {

        try {
            $this->student = $student->all()->firstOrFail();
        } catch (ItemNotFoundException $infe) {
            abort(404, $infe->getMessage());
        }
    }

    public function studentUpdateStatus($status, $studentId)
    {
        $student = Student::where('id', $studentId)->firstOrFail();

        switch($status) {
            case 'checkIn' :
                $student->checked_in = now();
                $student->save();
                break;
            case 'checkOut' :
                $student->checked_out = now();
                $student->save();
                break;
            case 'reset' :
                $student->checked_in = null;
                $student->checked_out = null;
                $student->save();
                break;
        }

    }

    public function guestUpdateStatus($status, $guestId)
    {
        $guest = Guest::where('id', $guestId)->firstOrFail();

        switch($status) {
            case 'checkIn' :
                $guest->checked_in = now();
                $guest->save();
                break;
            case 'checkOut' :
                $guest->checked_out = now();
                $guest->save();
                break;
            case 'reset' :
                $guest->checked_in = null;
                $guest->checked_out = null;
                $guest->save();
                break;
        }

    }
}
