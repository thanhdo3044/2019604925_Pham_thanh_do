<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class destroyBooking extends Mailable
{
    use Queueable, SerializesModels,InteractsWithQueue;

    public $softDelete;
    public $payment;
    /**
     * Create a new message instance.
     */
    public function __construct($softDelete, $payment)
    {
        $this->softDelete = $softDelete;
        $this->payment = $payment;
        $this->queue = 'email';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Đơn hàng thanh toán hủy lịch - Hoàn tiền',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.email.destroyBooking',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
