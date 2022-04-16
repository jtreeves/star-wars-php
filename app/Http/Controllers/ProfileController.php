<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Display profile details for single user
    public function show(Request $request): View
    {
        $id = $request->route('id');
        $profile = Profile::find($id);

        return view('profiles.show', [
            'profile' => $profile,
            'title' => "@{$profile->username}",
        ]);
    }
    
    // Display edit form for profile
    public function edit(Request $request): View
    {
        $id = $request->route('id');
        $profile = Profile::find($id);
        $name = $profile->username;
        $title = "{$name} - Edit";

        return view('profiles.edit', [
            'profile' => $profile,
            'title' => $title,
        ]);
    }
    
    // Persist changes to the profile to the database
    public function update(Request $request): RedirectResponse
    {
        $id = $request->route('id');
        $profile = Profile::find($id);

        $profile->update([
            'username' => $request->get('username'),
            'avatar' => $request->get('avatar'),
            'color' => $request->get('color'),
            'bio' => $request->get('bio'),
            'location' => $request->get('location'),
            'movie' => $request->get('movie'),
        ]);

        return redirect()->route(
            'profiles.show', 
            $profile->id
        );
    }
    
    // Delete profile
    public function destroy(Request $request): RedirectResponse
    {
        $id = $request->route('id');
        
        Profile::find($id)->delete();

        return redirect('/');
    }

    // Store a new profile
    public function store(Request $request): RedirectResponse
    {
        $profile = Profile::create([
            'user_id' => Auth::user()->id,
            'username' => $request->get('username'),
            'avatar' => $request->get('avatar'),
            'color' => $request->get('color'),
            'bio' => $request->get('bio'),
            'location' => $request->get('location'),
            'movie' => $request->get('movie'),
        ]);

        return redirect()->route(
            'profiles.show', 
            $profile->id
        );
    }

    // Show form to create a new profile
    public function create(): View
    {
        return view('profiles.create', [
            'title' => 'Create Your Profile',
        ]);
    }
}
