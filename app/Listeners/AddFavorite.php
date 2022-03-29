<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Events\StarMashup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddFavorite
{
    // The profile used by the listener
    private Profile $profile;

    // Create the event listener
    public function __construct()
    {
        $this->profile = Profile::find(Auth::user()->profile->id);
    }

    // Handle the event
    public function handle(StarMashup $event): void
    {   
        $this->profile->mashups()->attach($event->mashup);
    }
}
