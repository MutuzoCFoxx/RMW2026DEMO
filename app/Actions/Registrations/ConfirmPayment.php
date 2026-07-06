<?php

namespace App\Actions\Registrations;

use App\Models\Registration;
use Illuminate\Support\Str;

/**
 * NOTE: This is a DEMO payment confirmation for presentation purposes
 * only. No real money moves and no real gateway is contacted. In
 * production this would call out to a real integration such as
 * MTN MoMo Open API, Flutterwave, or a card acquirer, keeping the
 * same interface so callers don't need to change.
 */
class ConfirmPayment
{
    public function __invoke(Registration $registration, string $paymentMethod): Registration
    {
        $registration->update([
            'payment_method' => $paymentMethod,
            'payment_status' => 'paid',
            'payment_reference' => strtoupper(Str::random(12)),
            'paid_at' => now(),
        ]);

        return $registration;
    }
}
