<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use App\Models\Attendee;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use App\Mail\FinalConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class SendFinalConfirmationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:final-confirmation-email
                                {--ticket= : Send only to ticket based on reference number}
                                {--pretend : Display the number of records and list of emails that will be sent}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the final confirmation email with ticket links';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('ticket')) {
            $tickets = Ticket::where('uuid', 'like', "{$this->option('ticket')}%")->firstOrFail();
            $attendees = $tickets->attendee()->get();
        } else {
            $attendees = Attendee::get()->filter(function($attendee) {
                if(!$attendee->primary ) {
                    return $attendee;
                }
            });;
        }

        if ($attendees->count() == 0) {
            $this->components->info("No attendees will be emailed.");
            return;
        }

        $pl = Str::of('attendee')->plural($attendees->count());
        $this->components->info("{$attendees->count()} {$pl} will be emailed");

        if($this->option('pretend')) {
            $attendees->each(function($attendee) {
                $this->pretendToEmail($attendee);
            });

            return;
        }

        $attendees->each(function($attendee) {
            $this->email($attendee);
        });

        return Command::SUCCESS;
    }

    protected function pretendToEmail(Attendee $attendee) {
        $this->components->info("Will Email: {$attendee->email}");
    }

    protected function email(Attendee $attendee) {
        $this->components->info("Queuing email to: {$attendee->email}");

        try {
            Mail::to($attendee->email)
                ->queue(new FinalConfirmationEmail($attendee));
        } catch(Exception $e) {
            $this->components->info("Exception was caught: {$e->getMessage()}");
        }


    }
}
