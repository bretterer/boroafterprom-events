<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The student instance.
     *
     * @var \App\Models\Student
     */
    public $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
        // $student = Student::with('guest')->where('id', 'like', $orderId.'-%')->firstOrFail();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('tickets@boroafterprom.com', 'Boro Afterprom Tickets')
                    ->view('tickets.success');
    }
}
