<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Support\ItemNotFoundException;
use Livewire\Component;
use Livewire\WithPagination;
use Psr\Log\NullLogger;

class TicketPickup extends Component
{
    use WithPagination;

    public $search = '';
    public $ticketsSold = 0;
    public $ticketsPickedUp = 0;
    public $checkedIn = 0;

    public ?Student $student;

    protected $listeners = ['setCurrentStudent'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(Student $student)
    {
        try {
            $this->student = $student->all()->firstOrFail();
        } catch (ItemNotFoundException $infe) {
            abort(404, $infe->getMessage());
        }
    }

    public function setCurrentStudent(Student $student)
    {
        $this->student = $student;
        $this->emit('currentStudentSet');
    }

    public function render()
    {

        $this->ticketsSold = 0;
        $this->ticketsPickedUp = 0;
        $this->checkedIn = 0;
        $students = Student::with('guest')->where('first_name', 'like', '%'.$this->search.'%')->orWhere('last_name', 'like', '%'.$this->search.'%')->orWhere('id', 'like', $this->search.'%');

        foreach($students->get() as $student) {
            $this->ticketsSold++;

            if ( $student->guest ) {
                $this->ticketsSold++;;
            }

            if ($student->picked_up != null) {
                $this->ticketsPickedUp++;
                if ( $student->guest ) {
                    $this->ticketsPickedUp++;;
                }
            }

            if ($student->checked_in != null) {
                $this->checkedIn++;
                if ( $student->guest ) {
                    $this->checkedIn++;;
                }
            }
        }


        // $this->ticketsPickedUp

        return view('livewire.ticket-pickup', [
            'students'=> $students->paginate(10),
            'ticketsSold' => $this->ticketsSold,
            'ticketsPickedUp' => $this->ticketsPickedUp,
            'checkedIn' => $this->checkedIn,
        ]);
    }

    public function allowPickup()
    {
        $this->student->picked_up = null;
        if($this->student->payment_type == "cash") {
            $this->student->paid_on = null;
        }

        $this->student->save();

        $this->student->refresh();

        $this->emit('closeModal');
    }

    public function paidAndPickedUp()
    {
        $this->student->paid_on = now();
        $this->student->picked_up = now();
        $this->student->save();

        $this->student->refresh();

        $this->emit('closeModal');
    }

    public function pickedUp()
    {
        $this->student->picked_up = now();
        $this->student->save();

        $this->student->refresh();

        $this->emit('closeModal');
    }

}
