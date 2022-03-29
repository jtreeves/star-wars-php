<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use App\Http\Requests\Services\QuoteService;
use App\Http\Requests\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MashupController extends Controller
{
    // The array of all mashups to use
    private array $mashups;

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
        
        $mashup = Mashup::create([
            'quote' => $quote,
            'character' => $character,
            'image' => $image,
        ]);

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
