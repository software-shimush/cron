<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\JobModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Events\JobSubmitted;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use GuzzleHttp\Message\Request;


class JobPost implements ShouldQueue 
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
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('POST', $nextJob->destination, [
            'form_params' => $nextJob->payload
                ]);
           echo $result->getBody() ;
        }
        event(new JobSubmitted($this->user,$nextJob, false));
    } 
    }
}
