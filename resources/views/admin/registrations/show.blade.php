@extends('layouts.admin')

@section('title', 'Registration Detail')

@section('content')
<a href="{{ route('admin.registrations.index') }}" class="small d-inline-block mb-3"><i class="bi bi-arrow-left me-1"></i>Back to registrations</a>

<div class="card-rmw p-4" style="max-width:640px;">
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h5 class="fw-bold mb-0">{{ $registration->full_name }}</h5>
            <p class="text-muted small mb-0">{{ $registration->reference }}</p>
        </div>
        <span class="badge text-bg-{{ $registration->payment_status === 'paid' ? 'success' : ($registration->payment_status === 'failed' ? 'danger' : 'secondary') }} text-uppercase">{{ $registration->payment_status }}</span>
    </div>

    <table class="table table-sm">
        <tr><th class="text-muted" style="width:40%;">Email</th><td>{{ $registration->email }}</td></tr>
        <tr><th class="text-muted">Phone</th><td>{{ $registration->phone ?: '—' }}</td></tr>
        <tr><th class="text-muted">Organization</th><td>{{ $registration->organization ?: '—' }}</td></tr>
        <tr><th class="text-muted">Job title</th><td>{{ $registration->job_title ?: '—' }}</td></tr>
        <tr><th class="text-muted">Country</th><td>{{ $registration->country ?: '—' }}</td></tr>
        <tr><th class="text-muted">Delegate type</th><td class="text-capitalize">{{ $registration->delegate_type }}</td></tr>
        <tr><th class="text-muted">Ticket type</th><td class="text-capitalize">{{ str_replace('_',' ',$registration->ticket_type) }}</td></tr>
        <tr><th class="text-muted">Amount</th><td>{{ number_format($registration->amount) }} RWF</td></tr>
        <tr><th class="text-muted">Payment method</th><td class="text-capitalize">{{ $registration->payment_method ? str_replace('_',' ',$registration->payment_method) : '—' }}</td></tr>
        <tr><th class="text-muted">Payment reference</th><td>{{ $registration->payment_reference ?: '—' }}</td></tr>
        <tr><th class="text-muted">Paid at</th><td>{{ optional($registration->paid_at)->format('d M Y, H:i') ?: '—' }}</td></tr>
        <tr><th class="text-muted">Registered on</th><td>{{ $registration->created_at->format('d M Y, H:i') }}</td></tr>
    </table>
</div>
@endsection
