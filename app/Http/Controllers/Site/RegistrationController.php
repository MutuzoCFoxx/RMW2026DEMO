<?php

namespace App\Http\Controllers\Site;

use App\Actions\Registrations\CreateRegistration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreRegistrationRequest;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create', [
            'prices' => Registration::TICKET_PRICES,
        ]);
    }

    public function store(StoreRegistrationRequest $request, CreateRegistration $createRegistration)
    {
        $registration = $createRegistration($request->validated());

        if ($registration->payment_status === 'paid') {
            return redirect()->route('registration.success', $registration->reference);
        }

        return redirect()->route('payment.show', $registration->reference);
    }
}
