<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\JobModel;

class JobSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $job;
    public $firstTime;

    /**
     * Create a new event instance.
     *
     * @return void 
     */
    public function __construct($user, JobModel $job, $firstTime)
    {
        $this->user = $user;
        $this->job = $job;
        $this->firstTime = $firstTime;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
