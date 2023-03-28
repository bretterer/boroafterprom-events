<?php

namespace App\Http\Livewire;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Ticket;
use Livewire\Component;
use App\Models\Attendee;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketConfirmationEmail;

class Tickets extends Component
{
    public $ticketCount = 1;
    public $ticketCost = 10;
    public $hasGuest = false;
    public $paymentToken;
    public $totalCost;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $guest_first_name;
    public $guest_last_name;
    public $guest_email;
    public $guest_phone;
    public $confirmation;

    public $primaryAttendeeData;
    public $guestAttendeeData;
    protected Attendee $primaryAttendee;
    protected Attendee $guestAttendee;


    public function render()
    {
        return view('livewire.tickets');
    }

    public function mount()
    {
        $this->totalCost = $this->ticketCost * $this->ticketCount;
    }

    public function payCash()
    {
        $this->create();

        $primaryTicket = $this->primaryAttendee->ticket;
        $primaryTicket->payment_type = "cash";
        $primaryTicket->save();

        if($this->hasGuest) {
            $guestTicket = $this->guestAttendee->ticket;
            $guestTicket->payment_type = "cash";
            $guestTicket->save();
        }

        Mail::to($this->primaryAttendee->email)->send(new TicketConfirmationEmail($this->primaryAttendee, null));
        return redirect(route('tickets.success', ['ticketId' => explode('-', $primaryTicket->uuid)[0]]));
    }

    public function payCard()
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));

        $this->totalCost = $this->ticketCost * $this->ticketCount;

        $this->create();

        try {
            $charge = Charge::create([
                'amount' => $this->totalCost * 100,
                'currency' => 'usd',
                'description' => 'Boro Afterprom Tickets 2023',
                'source' => $this->paymentToken,
            ]);

            $primaryTicket = $this->primaryAttendee->ticket;
            $primaryTicket->paid_on = now();
            $primaryTicket->payment_type = $charge->source->brand;
            $primaryTicket->payment_id = $charge->id;
            $primaryTicket->save();

            if($this->hasGuest) {
                $guestTicket = $this->guestAttendee->ticket;
                $guestTicket->paid_on = now();
                $guestTicket->payment_type = $charge->source->brand;
                $guestTicket->payment_id = $charge->id;
                $guestTicket->save();
            }

            Mail::to($this->primaryAttendee->email)->send(new TicketConfirmationEmail($this->primaryAttendee, $charge));
            return redirect(route('tickets.success', ['ticketId' => explode('-', $primaryTicket->uuid)[0]]));
        }
        catch (CardException $ce) {
            $this->primaryAttendee->delete();

            if($this->hasGuest) {
                $this->guestAttendee->delete();
            }

            $errors = $this->getErrorBag();
            $errors->add('paymentErrors', $ce->getMessage());
        }
    }

    public function validateInput()
    {
        $this->primaryAttendeeData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'confirmation' => 'required',
        ]);

        if ($this->hasGuest) {
            $this->guestAttendeeData = $this->validate([
                'guest_first_name' => 'required',
                'guest_last_name' => 'required',
                'guest_email' => 'nullable|email',
                'guest_phone' => 'required',
            ]);
        }

    }

    protected function create()
    {

        $this->primaryAttendee = Attendee::create([
            'first_name' => $this->primaryAttendeeData['first_name'],
            'last_name' => $this->primaryAttendeeData['last_name'],
            'email' => $this->primaryAttendeeData['email'],
            'phone' => $this->primaryAttendeeData['phone'],
            'event_id' => '1',
        ]);

        $this->primaryAttendee->ticket()->save(Ticket::create([
            'event_id' => '1'
        ]));

        if ($this->hasGuest) {
            $this->guestAttendee = Attendee::create([
                'first_name' => $this->guestAttendeeData['guest_first_name'],
                'last_name' => $this->guestAttendeeData['guest_last_name'],
                'email' => $this->guestAttendeeData['guest_email'],
                'phone' => $this->guestAttendeeData['guest_phone'],
                'event_id' => '1',
            ]);

            $this->primaryAttendee->guest()->associate($this->guestAttendee)->save();
            $this->guestAttendee->ticket()->save(Ticket::create([
                'event_id' => '1'
            ]));
        }
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








    // protected $listeners = ['stripe.setPaymentToken' => 'setPaymentToken', 'tickets.paymentTokenSet' => 'paymentTokenSet'];

    // public function setPaymentToken($paymentToken)
    // {
    //     $this->paymentToken = $paymentToken;
    //     $this->emit('tickets.paymentTokenSet');
    // }

    // public function paymentTokenSet()
    // {
    //     $this->payCard();
    // }

    // public function rules()
    // {
    //     return [
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'confirmation' => 'required',
    //     ];
    // }

    // public function mount()
    // {
    //     $this->totalCost = $this->ticketCost * $this->ticketCount;
    // }

    // public function addGuest()
    // {
    //     $this->ticketCount = 2;
    //     $this->totalCost = $this->ticketCost * $this->ticketCount;
    //     $this->hasGuest = true;
    //     $this->emit('addGuest');
    // }

    // public function removeGuest()
    // {
    //     $this->ticketCount = 1;
    //     $this->totalCost = $this->ticketCost * $this->ticketCount;
    //     $this->hasGuest = false;
    //     $this->emit('removeGuest');
    // }

    // public function submitOrder()
    // {
    //     $this->validateInput();

    //     $this->primary = $this->createPrimaryAttendee();
    //     $this->primary->ticket()->create([]);

    //     if ($this->hasGuest) {
    //         $this->guest = $this->createGuestAttendee();
    //         $this->guest->ticket()->create([]);
    //         $this->primary->guest()->associate($this->guest)->save();
    //     }

    //     $this->emit('stripe.getPaymentToken');



    // }

    // public function createPrimaryAttendee()
    // {
    //     return Attendee::create([
    //         'first_name' => $this->primaryData['first_name'],
    //         'last_name' => $this->primaryData['last_name'],
    //         'email' => $this->primaryData['email'],
    //         'phone' => $this->primaryData['phone'],
    //     ]);
    // }

    // public function createGuestAttendee()
    // {
    //     return Attendee::create([
    //         'first_name' => $this->guestData['guest_first_name'],
    //         'last_name' => $this->guestData['guest_last_name'],
    //         'email' => $this->guestData['guest_email'],
    //         'phone' => $this->guestData['guest_phone']
    //     ]);
    // }


    // public function payCash()
    // {
    //     $people = $this->create();
    //     Log::info(vsprintf("Ticket Ordered with Cash: %s", $people));
    //     return redirect(route('tickets.success', ['orderId' => explode('-', $people['student']->id)[0]]));
    // }

    // public function payCard()
    // {
    //     Stripe::setApiKey(config('services.stripe.secret_key'));

    //     $this->totalCost = $this->ticketCost * $this->ticketCount;

    //     try {
    //         $charge = Charge::create([
    //             'amount' => $this->totalCost * 100,
    //             'currency' => 'usd',
    //             'description' => 'Boro After Prom Tickets',
    //             'source' => $this->paymentToken,
    //         ]);



    //         $this->primary->ticket->paid_on = now();
    //         $this->primary->ticket->payment_id = $charge->id;
    //         $this->primary->ticket->payment_type = $charge->source->brand;
    //         $this->primary->ticket->save();

    //         if($this->hasGuest){
    //             $this->guest->ticket->paid_on = now();
    //             $this->guest->ticket->payment_id = $charge->id;
    //             $this->guest->ticket->payment_type = $charge->source->brand;
    //             $this->guest->ticket->save();
    //         }

    //         Log::info(vsprintf("Ticket Ordered with Card: %s", $this->primary->toArray()));
    //         return redirect(route('tickets.success', ['orderId' => '']));
    //     } catch (CardException $ce) {


    //         $this->primary->delete();
    //         if ($this->hasGuest) {
    //             $this->guest->delete();
    //         }

    //         $errors = $this->getErrorBag();
    //         $errors->add('card', $ce->getMessage());
    //     }
    // }

    // public function validateInput()
    // {
    //     $this->primaryData = $this->validate();

    //     if ($this->hasGuest) {
    //         $this->guestData = $this->validate([
    //             'guest_first_name' => 'required',
    //             'guest_last_name' => 'required',
    //             'guest_email' => 'nullable|email',
    //             'guest_phone' => 'required',
    //         ]);
    //     }

    // }

    // protected function create()
    // {
    //     $student = null;
    //     $guest = null;


    //     // add student
    //     $student = Student::create([
    //         'first_name' => $studentData['first_name'],
    //         'last_name' => $studentData['last_name'],
    //         'email' => $studentData['email'],
    //         'phone' => $studentData['phone'],
    //         'payment_type' => 'cash',
    //         'payment_id' => null
    //     ]);


    //     if ($this->hasGuest) {
    //         // add guest
    //         $guest = Guest::create([
    //             'first_name' => $guestData['guest_first_name'],
    //             'last_name' => $guestData['guest_last_name'],
    //             'email' => $guestData['guest_email'],
    //             'phone' => $guestData['guest_phone']
    //         ]);

    //         $student->guest()->save($guest);
    //     }

    //     return ['student' => $student, 'guest' => $guest];
    // }

}
