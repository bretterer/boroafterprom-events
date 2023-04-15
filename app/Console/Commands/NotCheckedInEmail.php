<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use App\Models\Attendee;
use App\Mail\NotCheckedIn;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use App\Mail\FinalConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class NotCheckedInEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:not-checked-in
                                {--ticket= : Send only to ticket based on reference number}
                                {--pretend : Display the number of records and list of emails that will be sent}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to parents that student has not checked in';

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
                if(!$attendee->checked_in ) {
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
        $this->components->info("Will Email: {$attendee->parent_email}");
    }

    protected function email(Attendee $attendee) {
        $this->components->info("Queuing email to: {$attendee->parent_email}");

        Mail::to($attendee->parent_email)
            ->queue(new NotCheckedIn($attendee));

    }
}
