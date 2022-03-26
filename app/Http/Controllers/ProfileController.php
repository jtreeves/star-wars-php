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

        return view('profile.show', [
            'profile' => $profile
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

        return view('profile.edit', [
            'profile' => $profile
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

        $data = $request->validate([
            'username' => 'required|max:255',
            'avatar' => 'required|max:255',
            'bio' => 'max:255',
            'location' => 'max:255',
            'movie' => 'max:255',
        ]);

        $profile->update($data);

        return view('profile.show', [
            'profile' => $profile
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
            'username' => $request['username'],
            'avatar' => $request['avatar'],
            'bio' => $request['bio'],
            'location' => $request['location'],
            'movie' => $request['movie'],
        ]);

        return view('profile.show', [
            'profile' => $profile
        ]);
    }
}
