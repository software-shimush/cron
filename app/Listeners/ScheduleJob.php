<?php

namespace App\Listeners;

use App\Events\JobSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Jobs\JobEmail;
use App\Jobs\JobText;
use App\Jobs\JobPost;
class ScheduleJob
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() 
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobSubmitted  $event
     * @return void
     */
    public function handle(JobSubmitted $event)
    {
        $st = Carbon::createFromFormat('Y-m-d H:i:s', $event->job['start_date'] . " " . $event->job['start_time'], 'America/Toronto');
        $now = Carbon::now('America/Toronto');
        $interval = $event->job['interval'];
        $delay;
        
        //check if it's the first time 
        if($event->firstTime){
            $delay = $now->diffInMinutes($st);
        }else{
             $delay = $interval;
        }
        
        switch($event->job['type']){
            case "email":
                JobEmail::dispatch($event->job['id'], $event->user)->delay(now()->addMinutes($delay));
                break;
            case "text":
                JobText::dispatch($event->job['id'],$event->user)->delay(now()->addMinutes($delay));
                break;
            case "post":
                JobPost::dispatch($event->job['id'],$event->user)->delay(now()->addMinutes($delay));
                break;
        }
    }
}
