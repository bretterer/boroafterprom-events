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
        return view('livewire.ticket-pickup', [
            'students'=> Student::with('guest')->where('first_name', 'like', '%'.$this->search.'%')->orWhere('last_name', 'like', '%'.$this->search.'%')->orWhere('id', 'like', $this->search.'%')->paginate(10),
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
