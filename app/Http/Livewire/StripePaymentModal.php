<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StripePaymentModal extends Component
{
    public $paymentIntent;

    
    public function render()
    {
        return view('livewire.stripe-payment-modal');
    }
}
