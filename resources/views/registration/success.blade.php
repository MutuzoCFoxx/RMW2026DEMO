@extends('layouts.app')

@section('title', 'Registration Confirmed')

@section('content')
<section class="py-5">
    <div class="container" style="max-width: 640px;">
        <div class="card-rmw p-4 p-md-5 text-center mt-5">
            <i class="bi bi-check-circle-fill fs-1" style="color:var(--rw-green)"></i>
            <h2 class="fw-bold mt-3">You're registered!</h2>
            <p class="text-muted">A confirmation has been recorded for Rwanda Mining Week 2026. Please keep your reference number for check-in.</p>

            <div class="text-start bg-light rounded-3 p-4 mt-4">
                <div class="row small">
                    <div class="col-6 mb-2"><span class="text-muted">Reference</span><br><strong>{{ $registration->reference }}</strong></div>
                    <div class="col-6 mb-2"><span class="text-muted">Name</span><br><strong>{{ $registration->full_name }}</strong></div>
                    <div class="col-6 mb-2"><span class="text-muted">Ticket</span><br><strong class="text-capitalize">{{ str_replace('_',' ',$registration->ticket_type) }}</strong></div>
                    <div class="col-6 mb-2"><span class="text-muted">Amount</span><br><strong>{{ $registration->amount > 0 ? number_format($registration->amount).' RWF' : 'Complimentary' }}</strong></div>
                    <div class="col-6"><span class="text-muted">Status</span><br><span class="badge text-bg-success text-uppercase">{{ $registration->payment_status }}</span></div>
                    @if($registration->payment_reference && $registration->payment_reference !== 'COMPLIMENTARY')
                        <div class="col-6"><span class="text-muted">Payment Ref.</span><br><strong>{{ $registration->payment_reference }}</strong></div>
                    @endif
                </div>
            </div>

            <a href="{{ route('home') }}" class="btn btn-rmw-primary mt-4">Back to Home</a>
        </div>
    </div>
</section>
@endsection
