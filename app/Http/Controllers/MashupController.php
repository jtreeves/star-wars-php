<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use App\Http\Requests\Services\QuoteService;
use App\Http\Requests\Services\ImageService;
use Illuminate\Http\Request;

class MashupController extends Controller
{
    /**
     * The array of all mashups to use.
     *
     * @var array<int,string>
     */
    private $mashups = [];
    
    /**
     * The array of a single mashup to display.
     *
     * @var array<string,string>
     */
    private $mashup = [];

    /**
     * Display all mashups.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $character = $request->input('character');

        if ($character) {
            $this->mashups = Mashup::where('character', $character)->orderByDesc('created_at');
        } else {
            $this->mashups = Mashup::all()->orderByDesc('created_at');
        }

        return view('mashups.index', [
            'mashups' => $this->mashups,
            'character' => $character,
            'title' => 'Mashups',
        ]);
    }

    /**
     * Generate then store a new mashup.
     *
     * @return \Illuminate\View\View
     */
    public function store()
    {
        $quoteMaker = new QuoteService();
        $imageMaker = new ImageService();

        $package = $quoteMaker->getQuoteCharacter();
        $quote = $package['quote'];
        $character = $package['character'];
        $image = $imageMaker->getImage($character);

        $foundMashup = Mashup::where('quote', $quote)
            ->where('character', $character)
            ->where('image', $image);

        if ($foundMashup->id) {
            $this->store();
        } else {
            $this->mashup = Mashup::create([
                'quote' => $quote,
                'character' => $character,
                'image' => $image,
            ]);
        }

        return view('home', [
            'mashup' => $this->mashup,
        ]);
    }
}
