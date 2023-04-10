<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attendee;
use Illuminate\Support\ItemNotFoundException;


class Attendees extends Component
{
    use WithPagination;

    public $search = '';
    public ?Attendee $attendee;

    protected $queryString = ['search'];

    protected $listeners = ['refreshAttendeeList' => 'refresh'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $attendees = Attendee::where('first_name', 'like', $this->search.'%')
            ->orWhere('last_name', 'like', $this->search.'%')
            ->orderBy('first_name');

        return view('livewire.attendees', [
            'attendees' => $attendees->paginate(50),
            'search' => $this->search,
        ]);
    }

    public function refresh()
    {
        $this->resetPage();
    }


}
