<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;


class AdminMail extends Mailable
{
    use Queueable, SerializesModels,InteractsWithQueue;
        


        public $payment;
    /**
     * Create a new message instance.
     */
    public function __construct($payment)
    {
        //
        $this->payment = $payment;
        $this->queue = 'email';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo đơn hàng đặt đã chuyển khoản',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.email.notifyAdmin',
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
