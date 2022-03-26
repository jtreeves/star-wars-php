<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use Illuminate\Http\Request;

class MashupController extends Controller
{
    /**
     * Display all mashups.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $mashups = Mashup::all()->orderByDesc('created_at');

        return view('mashups', [
            'mashups' => $mashups
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
