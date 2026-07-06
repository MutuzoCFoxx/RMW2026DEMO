<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\Models\Registration;
use App\Models\Speaker;
use App\Models\Sponsor;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'registrations' => Registration::count(),
            'paid_registrations' => Registration::where('payment_status', 'paid')->count(),
            'revenue' => Registration::where('payment_status', 'paid')->sum('amount'),
            'speakers' => Speaker::count(),
            'sponsors' => Sponsor::count(),
            'exhibitors' => Exhibitor::count(),
        ];

        $recentRegistrations = Registration::latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recentRegistrations'));
    }
}
