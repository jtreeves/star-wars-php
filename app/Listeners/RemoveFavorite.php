<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Events\UnstarMashup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RemoveFavorite
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
     * @param  \App\Events\UnstarMashup  $event
     * @return void
     */
    public function handle(UnstarMashup $event)
    {
        $this->profile->mashups()->detach($event->mashup);
    }
}
