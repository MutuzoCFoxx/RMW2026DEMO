@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<section class="py-5" style="background: var(--rw-dark);">
    <div class="container text-white text-center py-4">
        <p class="eyebrow-mini text-warning">Almost there</p>
        <h1 class="fw-bold">Complete your payment</h1>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 640px;">

        <div class="alert alert-warning small">
            <i class="bi bi-info-circle me-1"></i>
            This is a <strong>demo payment flow</strong> built for the tender submission. No real transaction is processed here —
            in production this step connects to a live gateway (e.g. MTN MoMo Open API, Flutterwave, or a card acquirer).
        </div>

        <div class="card-rmw p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div>
                    <p class="text-muted small mb-0">Reference</p>
                    <h6 class="fw-bold mb-0">{{ $registration->reference }}</h6>
                </div>
                <div class="text-end">
                    <p class="text-muted small mb-0">Amount due</p>
                    <h4 class="fw-bold mb-0" style="color:var(--rw-blue)">{{ number_format($registration->amount) }} RWF</h4>
                </div>
            </div>

            <p class="mb-1"><strong>{{ $registration->full_name }}</strong> &middot; {{ ucfirst($registration->ticket_type) }} ({{ ucfirst($registration->delegate_type) }})</p>
            <p class="text-muted small mb-4">{{ $registration->email }}</p>

            <form method="POST" action="{{ route('payment.process', $registration->reference) }}">
                @csrf
                <h6 class="fw-bold mb-3">Choose a payment method</h6>
                <div class="row g-2 mb-4">
                    <div class="col-4">
                        <input type="radio" class="btn-check" name="payment_method" id="pm_momo" value="momo" checked required>
                        <label class="btn btn-outline-secondary w-100 py-3" for="pm_momo"><i class="bi bi-phone d-block fs-4 mb-1"></i>Mobile Money</label>
                    </div>
                    <div class="col-4">
                        <input type="radio" class="btn-check" name="payment_method" id="pm_card" value="card" required>
                        <label class="btn btn-outline-secondary w-100 py-3" for="pm_card"><i class="bi bi-credit-card d-block fs-4 mb-1"></i>Card</label>
                    </div>
                    <div class="col-4">
                        <input type="radio" class="btn-check" name="payment_method" id="pm_bank" value="bank_transfer" required>
                        <label class="btn btn-outline-secondary w-100 py-3" for="pm_bank"><i class="bi bi-bank d-block fs-4 mb-1"></i>Bank Transfer</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-rmw-primary btn-lg w-100">Pay {{ number_format($registration->amount) }} RWF</button>
            </form>
        </div>
    </div>
</section>
@endsection
