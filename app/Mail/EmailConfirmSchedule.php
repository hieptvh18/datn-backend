<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailConfirmSchedule extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public $subject = 'Thông báo';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData,$subject)
    {
        $this->mailData = $mailData;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('email.confirm-schedule');
    }
}
