<?php

namespace App\Http\Livewire;

use Stripe\Stripe;
use Livewire\Component;

class TicketOrderForm extends Component
{
    public $ticketCount = 1;
    public $ticketCost = 10;
    public $hasGuest = false;
    public $totalCost;

    public function mount()
    {

        $this->totalCost = $this->ticketCost * $this->ticketCount;
    }

    public function render()
    {
        return view('livewire.ticket-order-form');
    }

    public function addGuest()
    {
        $this->ticketCount = 2;
        $this->totalCost = $this->ticketCost * $this->ticketCount;
        $this->hasGuest = true;
        $this->emit('addGuest');
    }

    public function removeGuest()
    {
        $this->ticketCount = 1;
        $this->totalCost = $this->ticketCost * $this->ticketCount;
        $this->hasGuest = false;
        $this->emit('removeGuest');
    }
}
