<?php

namespace App\Events;

use App\Models\Mashup;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StarMashup implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // The mashup used by the event
    public Mashup $mashup;

    // Create a new event instance
    public function __construct(Mashup $mashup)
    {
        $this->mashup = $mashup;
    }

    // Get the channels the event should broadcast on
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('starring');
    }
}
