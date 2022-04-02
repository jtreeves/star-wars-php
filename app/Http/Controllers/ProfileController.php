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
            'title' => $profile->username,
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
    public function update(Request $request): View
    {
        $id = $request->route('id');
        $profile = Profile::find($id);

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:profiles'],
            'avatar' => ['required', 'string', 'url', 'max:255'],
            'color' => ['required', 'string', 'max:25'],
            'bio' => ['string', 'max:255'],
            'location' => ['string', 'max:255'],
            'movie' => ['string', 'max:255'],
        ]);

        $profile->update([
            'username' => $request->input('username'),
            'avatar' => $request->input('avatar'),
            'color' => $request->input('color'),
            'bio' => $request->input('bio'),
            'location' => $request->input('location'),
            'movie' => $request->input('movie'),
        ]);

        return view('profiles.show', [
            'profile' => $profile,
            'title' => $request->input('username'),
        ]);
    }
    
    // Delete profile
    public function destroy(Request $request): RedirectResponse
    {
        $id = $request->route('id');
        
        Profile::find($id)->delete();

        return redirect('/');
    }

    // Store a new profile
    public function store(Request $request): View
    {
        $profile = Profile::create([
            'user_id' => Auth::user()->id,
            'username' => $request->input('username'),
            'avatar' => $request->input('avatar'),
            'color' => $request->input('color'),
            'bio' => $request->input('bio'),
            'location' => $request->input('location'),
            'movie' => $request->input('movie'),
        ]);

        return view('profiles.show', [
            'profile' => $profile,
            'title' => $request->input('username'),
        ]);
    }

    // Show form to create a new profile
    public function create(): View
    {
        return view('profiles.create', [
            'title' => 'Create Your Profile',
        ]);
    }
}
