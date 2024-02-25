<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class MailSend extends Mailable
{
    use Queueable, SerializesModels,InteractsWithQueue;

    public $mailData;
    public $combo;
    public $booking;
    public $inputDatas;
    public $stylist;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData,$combo,$booking,$inputDatas, $stylist)
    {
        $this->mailData = $mailData;
        $this->combo = $combo;
        $this->booking = $booking;
        $this->inputDatas = $inputDatas;
        $this->stylist = $stylist;
        $this->queue = 'email';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cảm ơn bạn đã đặt lịch',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.email.bill',
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
