<?php

namespace App\Events;

use App\Models\Profile;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnfollowProfile implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // The profile used by the event
    public Profile $profile;

    // Create a new event instance
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    // Get the channels the event should broadcast on
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('unfollowing');
    }
}
