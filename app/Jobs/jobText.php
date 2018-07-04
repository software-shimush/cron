<?php

namespace App\Jobs;

use Twilio\Rest\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\JobModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Events\JobSubmitted;


class jobText implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $destination;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(JobModel $theJob)
    {
       $this->id = $theJob["id"];
       $this->destination = "+" . $theJob['destination'];
        // $this->destination = '+17327787355';
       $this->message = $theJob["message"];
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
                $account_sid = 'AC3d70f383f2f43e894495647ddf291c84';
                $auth_token = '15a8543dcaa84e09f8399194a20cc421';
                // In production, these should be environment variables. E.g.:
                // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
        
                // A Twilio number you own with SMS capabilities
                $twilio_number = "+12028518268";
        
                $client = new Client($account_sid, $auth_token);
                $client->messages->create(
                    // Where to send a text message (your cell phone?)
                    $this->destination,
                    array(
                        'from' => $twilio_number,
                        'body' =>  $this->message
                    )
        );
        
            }
            event(new JobSubmitted($nextJob, false));
        }
    }
}
