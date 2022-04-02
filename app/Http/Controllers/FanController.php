<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Events\FollowProfile;
use App\Events\UnfollowProfile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;

class FanController extends Controller
{
    // Profile to use throughout controller
    private Profile $profile;

    // Dispatch event to follow profile
    public function follow(Request $request): RedirectResponse
    {
        $id = $request->route('profileId');
        $this->profile = Profile::find($id);

        Event::dispatch(new FollowProfile($this->profile));

        return back();
    }
    
    // Dispatch event to unfollow profile
    public function unfollow(Request $request): RedirectResponse
    {
        $id = $request->route('profileId');
        $this->profile = Profile::find($id);

        Event::dispatch(new UnfollowProfile($this->profile));

        return back();
    }
}
