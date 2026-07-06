<?php

namespace App\Actions\Registrations;

use App\Models\Registration;
use Illuminate\Support\Str;

class CreateRegistration
{
    /**
     * Create a registration for the given ticket data. Complimentary
     * (zero-amount) tickets are marked paid immediately since there is
     * nothing to collect at the payment step.
     */
    public function __invoke(array $data): Registration
    {
        $registration = Registration::create([
            'reference' => 'RMW26-'.strtoupper(Str::random(8)),
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'organization' => $data['organization'] ?? null,
            'job_title' => $data['job_title'] ?? null,
            'country' => $data['country'] ?? null,
            'delegate_type' => $data['delegate_type'],
            'ticket_type' => $data['ticket_type'],
            'amount' => Registration::priceFor($data['ticket_type']),
            'payment_status' => 'pending',
        ]);

        if ($registration->amount === 0) {
            $registration->update([
                'payment_status' => 'paid',
                'payment_method' => null,
                'payment_reference' => 'COMPLIMENTARY',
                'paid_at' => now(),
            ]);
        }

        return $registration;
    }
}
