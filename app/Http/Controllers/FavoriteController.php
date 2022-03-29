<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use App\Events\StarMashup;
use App\Events\UnstarMashup;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;

class FavoriteController extends Controller
{
    // Mashup to use throughout controller
    private Mashup $mashup;

    // Dispatch event to star mashup
    public function star(Request $request): RedirectResponse
    {
        $id = $request->route('mashupId');
        $this->mashup = Mashup::find($id);

        Event::dispatch(new StarMashup($this->mashup));

        return back();
    }
    
    // Dispatch event to unstar mashup
    public function unstar(Request $request): RedirectResponse
    {
        $id = $request->route('mashupId');
        $this->mashup = Mashup::find($id);

        Event::dispatch(new UnstarMashup($this->mashup));

        return back();
    }
}
