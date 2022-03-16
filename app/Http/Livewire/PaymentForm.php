<?php

namespace App\Http\Livewire;

use Stripe\Stripe;
use App\Models\Guest;
use App\Models\Ticket;
use App\Models\Student;
use Livewire\Component;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\PaymentIntent;

class PaymentForm extends Component
{
    private $clientSecret;
    public $ticketCount = 1;
    public $ticketCost = 10;
    public $hasGuest = false;
    public $paymentToken;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $guest_first_name;
    public $guest_last_name;
    public $guest_email;
    public $guest_phone;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email',
        'phone' => 'required',
    ];

    public function mount()
    {
        // This is your test secret API key.
        Stripe::setApiKey(config('services.stripe.secret_key'));

        $paymentIntent = PaymentIntent::create([
            'amount' => 1000,
            'currency' => 'usd',
        ]);

        $this->clientSecret = $paymentIntent->client_secret;
        $this->totalCost = $this->ticketCost * $this->ticketCount;
    }

    public function render()
    {
        return view('livewire.payment-form');
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

    public function payCash()
    {
        $people = $this->create();
        return redirect(route('tickets.success', ['orderId' => explode('-', $people['student']->id)[0]]));
    }

    public function payCard()
    {
        $people = $this->create();

        Stripe::setApiKey(config('services.stripe.secret_key'));

        try {
            $charge = Charge::create([
                'amount' => $this->totalCost*100,
                'currency' => 'usd',
                'description' => 'Boro After Prom Tickets',
                'source' => $this->paymentToken,
            ]);

            $people['student']->paid_on = now();
            $people['student']->payment_id = $charge->id;
            $people['student']->payment_type = $charge->source->brand;
            $people['student']->card_end = $charge->source->last4;
            $people['student']->exp = $charge->source->exp_month . "/" . $charge->source->exp_year;
            $people['student']->save();

            return redirect(route('tickets.success', ['orderId' => explode('-', $people['student']->id)[0]]));

        } catch(CardException $ce) {


            $people['student']->delete();
            if($people['guest']) {
                $people['guest']->delete();
            }

            $errors = $this->getErrorBag();
            $errors->add('card', $ce->getMessage());


        }




    }

    public function validateInput()
    {
        $studentData = $this->validate();

        if($this->hasGuest) {
            $guestData = $this->validate([
                'guest_first_name' => 'required',
                'guest_last_name' => 'required',
                'guest_email' => 'email',
                'guest_phone' => 'required',
            ]);
        }
    }

    protected function create()
    {
        $student = null;
        $guest = null;

        $studentData = $this->validate();

        if($this->hasGuest) {
            $guestData = $this->validate([
                'guest_first_name' => 'required',
                'guest_last_name' => 'required',
                'guest_email' => 'email',
                'guest_phone' => 'required',
            ]);
        }

        // add student
        $student = Student::create([
            'first_name' => $studentData['first_name'],
            'last_name' => $studentData['last_name'],
            'email' => $studentData['email'],
            'phone' => $studentData['phone'],
            'payment_type' => 'cash',
            'payment_id' => null
        ]);


        if($this->hasGuest) {
            // add guest
            $guest = Guest::create([
                'first_name' => $guestData['guest_first_name'],
                'last_name' => $guestData['guest_last_name'],
                'email' => $guestData['guest_email'],
                'phone' => $guestData['guest_phone']
            ]);

            $student->guest()->save($guest);
        }

        return ['student'=>$student, 'guest'=>$guest];
    }
}
