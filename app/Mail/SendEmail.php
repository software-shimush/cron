<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendEmail extends Mailable 
{
    use Queueable, SerializesModels;
    public $job;
    public $user;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $job)
    {
        $this->user = $user;
        $this->job = $job;
        $this->text = $job->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->job->payload["cc"] === "" && $this->job->payload["bcc"] === ""){
            return $this->markdown('emails.email')
                    ->from("job@cron.com")
                    ->replyTo($this->user->email, $this->user->name)
                    ->subject($this->job->payload["subject"]);
        }else if($this->job->payload["cc"] === ""){
            return $this->markdown('emails.email')
                    ->from("job@cron.com")
                    ->bcc($this->job->payload["bcc"])
                    ->replyTo($this->user->email, $this->user->name)
                    ->subject($this->job->payload["subject"]);
        }else if($this->job->payload["bcc"] === ""){
            return $this->markdown('emails.email')
                    ->from("job@cron.com")
                    ->cc($this->job->payload["cc"])
                    ->replyTo($this->user->email, $this->user->name)
                    ->subject($this->job->payload["subject"]);
        }
        return $this->markdown('emails.email')
                    ->from("job@cron.com")
                    ->cc($this->job->payload["cc"])
                    ->bcc($this->job->payload["bcc"])
                    ->replyTo($this->user->email, $this->user->name)
                    ->subject($this->job->payload["subject"]);
            
    }
}
