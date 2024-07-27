<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\Profile_yayasan;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
    public function index()
    {
        $artikel = artikel::orderBy('created_at', 'desc')->take(1)->get();
        $artikels = artikel::orderBy('created_at', 'desc')
            ->skip(1)
            ->take(2)
            ->get();
        $profile = Profile_yayasan::find(1);
        return view('index', compact('artikel', 'artikels','profile'));
    }
    public function readmore()
    {
        $artikel = artikel::with('author')->get();
        return view('artikel.index', compact('artikel'));
    }
}
