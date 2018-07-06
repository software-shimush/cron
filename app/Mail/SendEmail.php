<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $text;
    public $user;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $text, $subject)
    {
        $this->user = $user;
        $this->text = $text;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email, $this->user->name)
            ->subject($this->subject) 
            ->markdown('emails.email');
    }
}
