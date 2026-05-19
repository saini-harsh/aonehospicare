<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentFailedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $isAdmin;
    public $errorMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $isAdmin = false, $errorMessage = '')
    {
        $this->order = $order;
        $this->isAdmin = $isAdmin;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isAdmin
            ? "Payment Failed for Order: #" . $this->order->order_number
            : "Payment Unsuccessful: Action Required for Order #" . $this->order->order_number;

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
            markdown: 'emails.payment-failed',
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
