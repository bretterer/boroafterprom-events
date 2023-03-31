<?php

namespace App\Http\Livewire;

use Stripe\Charge;
use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\Attendee;
use App\Events\AttendeeCheckedIn;
use App\Events\AttendeeCheckedOut;

class AttendeeDetailModal extends Component
{
    public ?Attendee $attendee;
    public $paymentInfo = [];

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
        $this->attendee = $attendee->fresh(['ticket']);


        $ticket = $this->attendee->ticket;


        if($ticket->payment_id != null) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

            $charge = $stripe->charges->retrieve($ticket->payment_id);

            $this->paymentInfo['brand'] = $charge->payment_method_details->card->brand;
            $this->paymentInfo['last4'] = $charge->payment_method_details->card->last4;
            $this->paymentInfo['exp_month'] = $charge->payment_method_details->card->exp_month;
            $this->paymentInfo['exp_year'] = $charge->payment_method_details->card->exp_year;
        }


        $this->emit('currentAttendeeSet');
    }

    public function render()
    {
        return view('livewire.attendee-detail-modal');
    }

    public function checkIn()
    {
        $this->attendee->checked_in = now();
        $this->attendee->save();

        AttendeeCheckedIn::dispatch($this->attendee);

    }

    public function checkOut()
    {
        $this->attendee->checked_out = now();
        $this->attendee->save();

        AttendeeCheckedOut::dispatch($this->attendee);

    }

    public function markPaid()
    {
        $this->attendee->ticket->paid_on = now();
        $this->attendee->ticket->save();

        if($this->attendee->guest) {
            $this->attendee->guest->ticket->paid_on = now();
            $this->attendee->guest->ticket->save();
        }
    }

    public function markUnpaid()
    {
        $this->attendee->ticket->paid_on = null;
        $this->attendee->ticket->save();

        if($this->attendee->guest) {
            $this->attendee->guest->ticket->paid_on = null;
            $this->attendee->guest->ticket->save();
        }
    }
}
