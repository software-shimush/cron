<?php

namespace App\Listeners;

use App\Events\JobSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckCompleted
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
        $now = Carbon::now('America/Toronto');
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $event->job['end_date'] . " " .          $event->job['end_time'], 'America/Toronto');
        $interval = $event->job['interval'];
        $checkEndTime = $now->addMinutes($interval);

        if($checkEndTime->greaterThanOrEqualTo($endTime)){
            $job = JobModel::findOrFail($event->job['id']);
            $job->status = "completed";
            $job->save();
        }
    }
}
