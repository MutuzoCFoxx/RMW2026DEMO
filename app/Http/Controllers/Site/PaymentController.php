<?php

namespace App\Http\Controllers\Site;

use App\Actions\Registrations\ConfirmPayment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ProcessPaymentRequest;
use App\Models\Registration;

class PaymentController extends Controller
{
    public function show(Registration $registration)
    {
        abort_if($registration->payment_status === 'paid', 404);

        return view('registration.payment', compact('registration'));
    }

    public function process(ProcessPaymentRequest $request, Registration $registration, ConfirmPayment $confirmPayment)
    {
        abort_if($registration->payment_status === 'paid', 404);

        $confirmPayment($registration, $request->validated()['payment_method']);

        return redirect()->route('registration.success', $registration->reference);
    }

    public function success(Registration $registration)
    {
        abort_if($registration->payment_status !== 'paid', 404);

        return view('registration.success', compact('registration'));
    }
}
