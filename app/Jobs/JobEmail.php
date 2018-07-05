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
use App\Events\JobAboutToRun;

class JobEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
   

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
       
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
                Mail::to($nextJobs->destination)->send(new SendEmail($nextJob->message));
            }
            event(new JobSubmitted($nextJob, false));
        }
    }

}
