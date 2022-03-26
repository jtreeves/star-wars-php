<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Add a mashup as a favorite for the authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $profileId = $request->route('profileId');
        $mashupId = $request->route('mashupId');

        Favorite::create([
            'profile_id' => $profileId,
            'mashup_id' => $mashupId,
        ]);
    }
    
    /**
     * Unfavorite a mashup for the authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');

        Favorite::find($id)->delete();
    }
}
