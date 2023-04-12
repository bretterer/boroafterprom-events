<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\LabelPickupReminder as LabelPickupReminderMailer;

class LabelPickupReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:label-pickup-reminder
                                {--first=50 : Send only to ticket based on reference number}
                                {--ticket= : Send only to ticket based on reference number}
                                {--pretend : Display the number of records and list of emails that will be sent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminder to pick up printed labels';

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
            $tickets = Ticket::limit($this->option('first'))->get();
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
            ->queue(new LabelPickupReminderMailer($ticket->attendee));
    }
}
