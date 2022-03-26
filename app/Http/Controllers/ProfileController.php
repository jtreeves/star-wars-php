<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display profile details for single user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $id = $request->route('id');
        $profile = Profile::find($id);

        return view('profiles.show', [
            'profile' => $profile,
            'title' => $profile->username,
        ]);
    }
    
    /**
     * Display edit form for profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
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
    
    /**
     * Persist changes to the profile to the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function update(Request $request)
    {
        $id = $request->route('id');
        $profile = Profile::find($id);

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:profiles'],
            'avatar' => ['required', 'string', 'url', 'max:255'],
            'bio' => ['string', 'max:255'],
            'location' => ['string', 'max:255'],
            'movie' => ['string', 'max:255'],
        ]);

        $profile->update([
            'username' => $request->input('username'),
            'avatar' => $request->input('avatar'),
            'bio' => $request->input('bio'),
            'location' => $request->input('location'),
            'movie' => $request->input('movie'),
        ]);

        return view('profiles.show', [
            'profile' => $profile,
            'title' => $request->input('username'),
        ]);
    }
    
    /**
     * Delete profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');
        
        Profile::find($id)->delete();

        return redirect('/');
    }

    /**
     * Store a new profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $profile = Profile::create([
            'username' => $request->input('username'),
            'avatar' => $request->input('avatar'),
            'bio' => $request->input('bio'),
            'location' => $request->input('location'),
            'movie' => $request->input('movie'),
        ]);

        return view('profiles.show', [
            'profile' => $profile,
            'title' => $request->input('username'),
        ]);
    }

    /**
     * Show form to create a new profile.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profiles.create', [
            'title' => 'Create Your Profile',
        ]);
    }
}
