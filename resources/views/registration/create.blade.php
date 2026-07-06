@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="py-5" style="background: var(--rw-dark);">
    <div class="container text-white text-center py-4">
        <p class="eyebrow-mini">Join us</p>
        <h1 class="fw-bold">Register for Rwanda Mining Week 2026</h1>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 760px;">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="card-rmw p-4 p-md-5">
            <form method="POST" action="{{ route('registration.store') }}">
                @csrf

                <h5 class="fw-bold mb-3">Your details</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full name *</label>
                        <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+250 7xx xxx xxx">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Organization</label>
                        <input type="text" name="organization" class="form-control" value="{{ old('organization') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Job title</label>
                        <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}">
                    </div>
                </div>

                @php($selectAccents = ['navy', 'sky', 'orange', 'green'])
                <h5 class="fw-bold mt-4 mb-3">Delegate type</h5>
                <div class="row g-2">
                    @foreach(['delegate' => 'Delegate', 'exhibitor' => 'Exhibitor', 'speaker' => 'Speaker', 'media' => 'Media', 'vip' => 'VIP'] as $value => $label)
                    <div class="col-6 col-md-4">
                        <input type="radio" class="btn-check" name="delegate_type" id="dt_{{ $value }}" value="{{ $value }}" {{ old('delegate_type') === $value ? 'checked' : ($value === 'delegate' && !old('delegate_type') ? 'checked' : '') }} required>
                        <label class="btn btn-select btn-select-{{ $selectAccents[$loop->index % 4] }} w-100" for="dt_{{ $value }}">{{ $label }}</label>
                    </div>
                    @endforeach
                </div>

                <h5 class="fw-bold mt-4 mb-3">Ticket type</h5>
                <div class="row g-2">
                    @foreach($prices as $value => $price)
                    <div class="col-6 col-md-3">
                        <input type="radio" class="btn-check" name="ticket_type" id="tt_{{ $value }}" value="{{ $value }}" {{ old('ticket_type') === $value ? 'checked' : ($value === 'standard' && !old('ticket_type') ? 'checked' : '') }} required>
                        <label class="btn btn-select btn-select-{{ $selectAccents[$loop->index % 4] }} w-100 h-100 py-3" for="tt_{{ $value }}">
                            <span class="d-block fw-bold text-capitalize">{{ str_replace('_', ' ', $value) }}</span>
                            <span class="d-block small">{{ $price > 0 ? number_format($price).' RWF' : 'Free' }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-rmw-primary btn-lg w-100 mt-4">Continue to Payment</button>
                <p class="small text-muted text-center mt-2 mb-0">Media passes are complimentary and confirmed instantly, no payment required.</p>
            </form>
        </div>
    </div>
</section>
@endsection
