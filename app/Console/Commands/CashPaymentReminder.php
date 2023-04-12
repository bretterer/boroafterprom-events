<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CashPaymentReminder as CashPaymentReminderMailer;

class CashPaymentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:cash-payment-reminder
                                {--ticket= : Send only to ticket based on reference number}
                                {--pretend : Display the number of records and list of emails that will be sent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminder to come pay cash for ticket';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('ticket')) {
            $tickets = Ticket::where('paid_on', null)->where('payment_type', 'cash')->where('uuid', 'like', "{$this->option('ticket')}%")->get();
        } else {
            $tickets = Ticket::where('paid_on', null)->where('payment_type', 'cash')->get();
        }

        if ($tickets->count() == 0) {
            $this->components->info("No attendees will be emailed.");
        } else {
            $pl = Str::of('attendee')->plural($tickets->count());
            $this->components->info("{$tickets->count()} {$pl} will be emailed");
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

        Mail::to($ticket->attendee->email)
            ->queue(new CashPaymentReminderMailer($ticket->attendee));
    }
}
