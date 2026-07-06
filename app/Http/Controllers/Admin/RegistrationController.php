<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Registrations\ExportRegistrationsCsv;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $registrations = Registration::query()
            ->when($request->filled('status'), fn ($q) => $q->where('payment_status', $request->string('status')))
            ->when($request->filled('search'), function ($q) use ($request) {
                $term = '%'.$request->string('search').'%';
                $q->where(fn ($q2) => $q2->where('full_name', 'like', $term)
                    ->orWhere('email', 'like', $term)
                    ->orWhere('reference', 'like', $term));
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(Registration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function export(ExportRegistrationsCsv $exportRegistrationsCsv): StreamedResponse
    {
        return $exportRegistrationsCsv();
    }
}
