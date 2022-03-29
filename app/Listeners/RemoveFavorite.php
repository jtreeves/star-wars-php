<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Events\UnstarMashup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RemoveFavorite
{
    // Profile used by the listener
    private Profile $profile;

    // Create the event listener
    public function __construct()
    {
        $this->profile = Profile::find(Auth::user()->profile->id);
    }

    // Handle the event
    public function handle(UnstarMashup $event): void
    {
        $this->profile->mashups()->detach($event->mashup);
    }
}
