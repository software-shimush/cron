<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\JobModel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class JobEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $destination;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(JobModel $theJob)
    {
        $this->destination = $theJob["destination"];
        $this->message = $theJob["message"];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->destination)->send(new SendEmail($this->message));
    }
}
