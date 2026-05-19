<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $isAdmin;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $isAdmin = false)
    {
        $this->order = $order;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isAdmin
            ? "Payment Received for Order: #" . $this->order->order_number
            : "Payment Successful: Your Order #" . $this->order->order_number . " is confirmed";

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.payment-confirmed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
