<?php

namespace App\Mail;

use App\Models\Attendee;
use Stripe\Charge;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Attendee
     *
     * @var \App\Models\Attendee
     */
    public $attendee;

    /**
     * Stripe Charge Object
     *
     * @var \Stripe\Charge|null
     */
    public $paymentInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Attendee $attendee, Charge|null $charge)
    {
        $this->attendee = $attendee;
        $this->paymentInfo = $charge;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Boro Afterprom Tickets',
            from: 'info@boroafterprom.com',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'tickets.success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
