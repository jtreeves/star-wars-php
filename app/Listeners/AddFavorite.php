<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Events\StarMashup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddFavorite
{
    private $profile;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->profile = Profile::find(Auth::user()->profile->id);
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\StarMashup  $event
     * @return void
     */
    public function handle(StarMashup $event)
    {   
        $this->profile->mashups()->attach($event->mashup);
    }
}
