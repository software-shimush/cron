<?php

namespace App\Listeners;

use App\Events\JobSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Jobs\JobEmail;

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
        $diff = $now->diffInMinutes($st);
        // dd($diff);
        switch($event->job['type']){
            case "email":
                JobEmail::dispatch($event->job)->delay(now()->addMinutes($diff));
                break;
        }
    }
}
