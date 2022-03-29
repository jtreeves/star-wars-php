<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use App\Events\StarMashup;
use App\Events\UnstarMashup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class FavoriteController extends Controller
{
    private $mashup;

    public function star(Request $request)
    {
        $id = $request->route('mashupId');
        $this->mashup = Mashup::find($id);

        Event::dispatch(new StarMashup($this->mashup));

        return back();
    }
    
    public function unstar(Request $request)
    {
        $id = $request->route('mashupId');
        $this->mashup = Mashup::find($id);

        Event::dispatch(new UnstarMashup($this->mashup));

        return back();
    }
}
