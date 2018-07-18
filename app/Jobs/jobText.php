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
    protected $user;
   
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id,$user)
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
                $account_sid = 'AC3d70f383f2f43e894495647ddf291c84';
            
                // In production, these should be environment variables. E.g.:
                $auth_token = $_ENV["TWILIO_ACCOUNT_SID"];
                $account_sid  = $_ENV["TWILIO_ACCOUNT_ID"];
        
                // A Twilio number you own with SMS capabilities
                $twilio_number = "+12028518268";
        
                $client = new Client($account_sid, $auth_token);
                $client->messages->create(
                    "+" . $nextJob->destination ,
                    array(
                        'from' => $twilio_number,
                        'body' =>  $nextJob->message
                    )
        );
        
            }
            event(new JobSubmitted($this->user,$nextJob, false));
        }
    }
}
