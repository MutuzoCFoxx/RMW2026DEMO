<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ProgramSession;

class ProgramController extends Controller
{
    public function index()
    {
        $sessions = ProgramSession::orderBy('session_date')
            ->orderBy('start_time')
            ->orderBy('sort_order')
            ->get()
            ->groupBy(fn ($s) => $s->session_date->format('Y-m-d'));

        return view('program', compact('sessions'));
    }
}
