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
use App\Events\JobSubmitted;

class JobEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $user;
   

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $user)
    {
        $this->id = $id;
        $this->user = $user;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $nextJob = JobModel::find($this->id); 
        if($nextJob && $nextJob->status !== "completed"){
            if($nextJob->status === "active"){
                Mail::to($nextJob->destination)
                ->cc($nextJob->payload["cc"])
                ->bcc($nextJob->payload["bcc"])
                ->send(new SendEmail($this->user, $nextJob->message, $nextJob->payload["subject"]));
            }
            event(new JobSubmitted($this->user, $nextJob, false));
        }
    } 

}
