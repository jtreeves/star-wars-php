<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use App\Http\Requests\Services\QuoteService;
use App\Http\Requests\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MashupController extends Controller
{
    // The array of all mashups to use
    private Collection $mashups;

    // Display all mashups
    public function index(Request $request): View
    {
        $character = $request->input('character');

        if ($character) {
            $this->mashups = Mashup::query()
                ->where(
                    'character', 
                    'LIKE', 
                    "%{$character}%"
                )
                ->get()
                ->sortByDesc('created_at');
        } else {
            $this->mashups = Mashup::all()
                ->sortByDesc('created_at');
        }

        return view('mashups.index', [
            'mashups' => $this->mashups,
            'character' => $character,
            'title' => 'Mashups',
            'view' => 'index',
        ]);
    }

    // Display feed mashups favorited by profiles the current user follows
    public function feed(Request $request): View
    {
        $character = $request->input('character');

        $profileIds = array_unique(DB::table('fans')->where('follower_id', Auth::user()->profile->id)->pluck('following_id')->toArray());
        $mashupIds = array_unique(DB::table('favorites')->whereIn('profile_id', $profileIds)->pluck('mashup_id')->toArray());

        if ($character) {
            $this->mashups = Mashup::query()
                ->whereIn(
                    'id',
                    $mashupIds
                )
                ->where(
                    'character', 
                    'LIKE', 
                    "%{$character}%"
                )
                ->get()
                ->sortByDesc('created_at');
        } else {
            $this->mashups = Mashup::query()
                ->whereIn(
                    'id',
                    $mashupIds
                )
                ->get()
                ->sortByDesc('created_at');
        }

        return view('mashups.index', [
            'mashups' => $this->mashups,
            'character' => $character,
            'title' => 'Mashups Feed',
            'view' => 'feed',
        ]);
    }

    // Generate then store a new mashup
    public function store(): RedirectResponse
    {
        $quoteMaker = new QuoteService();
        $imageMaker = new ImageService();

        $package = $quoteMaker->getQuoteCharacter();
        $quote = $package['quote'];
        $character = $package['character'];
        $image = $imageMaker->getImage($character);

        if (!Mashup::where('quote', $quote)->where('image', $image)->first()) {
            $mashup = Mashup::create([
                'quote' => $quote,
                'character' => $character,
                'image' => $image,
            ]);
        } else {
            $this->store();
        }

        return redirect()->route(
            'mashups.show', 
            $mashup->id
        );
    }

    // Show the new mashup
    public function show(Request $request): View
    {
        $id = $request->route('id');
        $mashup = Mashup::find($id);

        return view('mashups.show', [
            'mashup' => $mashup,
            'title' => $mashup->character,
        ]);
    }
}
