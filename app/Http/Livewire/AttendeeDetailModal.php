<?php

namespace App\Http\Livewire;

use Stripe\Charge;
use Stripe\Refund;
use Stripe\Stripe;
use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\Activity;
use App\Models\Attendee;
use App\Mail\EventTicket;
use App\Events\LogActivity;
use App\Events\AttendeeCheckedIn;
use App\Events\AttendeeCheckedOut;
use Illuminate\Support\Facades\Mail;
use Stripe\Exception\InvalidRequestException;

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
        $this->attendee = $attendee->fresh(['ticket', 'activityLog']);

        $ticket = $this->attendee->ticket;


        if($ticket->payment_id != null) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

            try{
                $charge = $stripe->charges->retrieve($ticket->payment_id);

                $this->paymentInfo['brand'] = $charge->payment_method_details->card->brand;
                $this->paymentInfo['last4'] = $charge->payment_method_details->card->last4;
                $this->paymentInfo['exp_month'] = $charge->payment_method_details->card->exp_month;
                $this->paymentInfo['exp_year'] = $charge->payment_method_details->card->exp_year;
            } catch(InvalidRequestException $ire) {
                $this->paymentInfo['brand'] = 'N/A';
                $this->paymentInfo['last4'] = 'N/A';
                $this->paymentInfo['exp_month'] = 'N/A';
                $this->paymentInfo['exp_year'] = 'N/A';
            };
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

        $this->attendee = $this->attendee->fresh(['ticket', 'activityLog']);

        LogActivity::dispatch('Checked In', 'check', $this->attendee);
        AttendeeCheckedIn::dispatch($this->attendee);

    }

    public function checkOut()
    {
        $this->attendee->checked_out = now();
        $this->attendee->save();

        $this->attendee = $this->attendee->fresh(['ticket', 'activityLog']);

        LogActivity::dispatch('Checked Out', 'checkRed', $this->attendee);
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

        LogActivity::dispatch('Marked as Paid', 'cash', $this->attendee);
    }

    public function markUnpaid()
    {
        $this->attendee->ticket->paid_on = null;
        $this->attendee->ticket->save();

        if($this->attendee->guest) {
            $this->attendee->guest->ticket->paid_on = null;
            $this->attendee->guest->ticket->save();
        }

        LogActivity::dispatch('Marked as Unpaid', 'cash', $this->attendee);
    }

    public function resendTicket()
    {
        Mail::to($this->attendee->email)->send(new EventTicket($this->attendee));
    }

    public function getAttendeeName()
    {
        return "{{$this->attendee->first_name}} {{$this->attendee->last_name}}";
    }

    public function deleteAttendee()
    {


        $attendee = $this->attendee;
        $guest = null;
        $primary = null;
        $charge = null;


        if($attendee->isGuest()) {
            $primary = $attendee->primary;
            $guest = $attendee;
        } else {
            $primary = $attendee;
        }

        if($primary->guest) {
            $guest = $primary->guest;
        }

        if($primary->ticket->payment_type != null && $primary->ticket->payment_type != 'cash') {
            try{
                // $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
                Stripe::setApiKey(config('services.stripe.secret_key'));
                $charge = Charge::retrieve($this->attendee->ticket->payment_id);
                // $charge = $stripe->charges->retrieve($this->attendee->ticket->payment_id);
                $refund = Refund::create([
                    'charge' => $charge->id,
                    'amount' => $charge->amount,
                    'reason' => 'requested_by_customer'
                ]);
            } catch(InvalidRequestException $ire) {

            } catch(\Exception $e) {

            }
        }

        $primary->delete();
        if($guest != null) {
            $guest->delete();
        }

        $this->emitUp('refreshAttendeeList');
        $this->emit('closeModal');
    }
}
