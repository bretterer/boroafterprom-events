<?php

namespace App\Mail;

use Stripe\Charge;
use App\Models\Attendee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketReconfirmationEmail extends Mailable
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
            from: new Address(
                address: 'info@boroafterprom.com',
                name: 'Springboro Afterprom'
            )
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
            view: 'emails.reconfirmation',
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
