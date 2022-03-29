<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use App\Events\StarMashup;
use App\Events\UnstarMashup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class EventController extends Controller
{
    public function star(Request $request)
    {
        $id = $request->route('mashupId');
        $mashup = Mashup::find($id);

        Event::dispatch(new StarMashup($mashup));

        return back();
    }
    
    public function unstar(Request $request)
    {
        $id = $request->route('mashupId');
        $mashup = Mashup::find($id);

        Event::dispatch(new UnstarMashup($mashup));

        return back();
    }
}
