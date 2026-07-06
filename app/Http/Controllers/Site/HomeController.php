<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\Models\Speaker;
use App\Models\Sponsor;

class HomeController extends Controller
{
    public function index()
    {
        $speakers = Speaker::orderBy('is_keynote', 'desc')->orderBy('sort_order')->take(8)->get();
        $sponsors = Sponsor::orderBy('sort_order')->get()->groupBy('tier');
        $exhibitorCount = Exhibitor::count();

        return view('home', compact('speakers', 'sponsors', 'exhibitorCount'));
    }

    public function about()
    {
        return view('about');
    }

    public function venue()
    {
        return view('venue');
    }
}
