<?php

namespace App\Console\Commands;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketReconfirmationEmail;
use Stripe\Exception\InvalidRequestException;

class Reconfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:reconfirmation
                                {--before=4/3/2023 : Send only to people who ordered on or before (inclusive)}
                                {--ticket= : Send only to ticket based on reference number}
                                {--pretend : Display the number of records and list of emails that will be sent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the correct confirmation email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('ticket')) {
            $tickets = Ticket::where('uuid', 'like', "{$this->option('ticket')}%")->limit($this->option('first'))->get();
        } else {
            $date = Carbon::createFromFormat('m/d/Y', $this->option('before'));
            $tickets = Ticket::where('created_at', '<=', $date)->get();
            $tickets = $tickets->filter(function($ticket) {
                return !$ticket->attendee->isGuest();
            });



        }

        if ($this->option('pretend')) {
            $tickets->each(function ($ticket) {
                $this->pretendToEmail($ticket);
            });

            return;
        }

        $tickets->each(function ($ticket) {
            $this->email($ticket);
        });
    }

    protected function pretendToEmail(Ticket $ticket) {
        $this->components->info("{$ticket->attendee->email}");
    }

    protected function email(Ticket $ticket) {
        $this->components->info("Queuing email to: {$ticket->attendee->email}");
        $charge = null;

        if($ticket->attendee->ticket->payment_type != null && $ticket->attendee->ticket->payment_type != 'cash') {
            try{
                // $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
                Stripe::setApiKey(config('services.stripe.secret_key'));
                $charge = Charge::retrieve($ticket->attendee->ticket->payment_id);

            } catch(InvalidRequestException $ire) {

            } catch(\Exception $e) {

            }
        }
        try {
            Mail::to($ticket->attendee->email)
                ->queue(new TicketReconfirmationEmail($ticket->attendee, $charge));
        } catch(Exception $e) {
            $this->components->info("Exception was caught: {$e->getMessage()}");
        }

    }
}
