<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class ModeController extends Controller
{
    // Dispatch event to set light mode
    public function light(): RedirectResponse
    {
        session(['mode' => 'light']);

        return back();
    }
    
    // Dispatch event to set dark mode
    public function dark(): RedirectResponse
    {
        session(['mode' => 'dark']);

        return back();
    }
}
