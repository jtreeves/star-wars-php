<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
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
     * Store a new mashup.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Mashup::create([
            'quote' => $request['quote'],
            'character' => $request['character'],
            'image' => $request['image'],
        ]);
    }
}
