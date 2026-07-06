@extends('layouts.app')

@section('title', 'Program')

@php
$typeColors = [
    'plenary' => 'navy', 'breakout' => 'sky', 'exhibition' => 'green',
    'networking' => 'orange', 'gala' => 'navy', 'site_visit' => 'sky', 'break' => 'neutral',
];
$dotColors = [
    'navy' => 'var(--rw-dark)', 'sky' => 'var(--rw-blue)', 'orange' => 'var(--rw-yellow)',
    'green' => 'var(--rw-green)', 'neutral' => '#c3cad6',
];
@endphp

@section('content')
<section class="py-5" style="background: var(--rw-dark);">
    <div class="container text-white text-center py-4">
        <p class="eyebrow-mini">December 9&ndash;11, 2026</p>
        <h1 class="fw-bold">Event Program</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        @forelse($sessions as $date => $daySessions)
            <div class="mb-5">
                <h3 class="fw-bold mb-4">
                    <i class="bi bi-calendar3 me-2" style="color:var(--rw-blue)"></i>
                    {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                </h3>
                <div class="timeline-day">
                    @foreach($daySessions as $session)
                        @php($dotColor = $dotColors[$typeColors[$session->session_type] ?? 'neutral'] ?? '#c3cad6')
                        <div class="timeline-item" style="--dot-color: {{ $dotColor }}">
                            <div class="card-rmw p-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-start gap-2">
                                    <div>
                                        <span class="badge session-type-badge badge-{{ $typeColors[$session->session_type] ?? 'neutral' }}">{{ str_replace('_',' ', $session->session_type) }}</span>
                                        <h5 class="fw-bold mt-2 mb-1">{{ $session->title }}</h5>
                                        @if($session->description)
                                            <p class="small text-muted mb-1">{{ $session->description }}</p>
                                        @endif
                                        @if($session->speaker_name)
                                            <p class="small mb-0"><i class="bi bi-person-badge me-1"></i>{{ $session->speaker_name }}</p>
                                        @endif
                                    </div>
                                    <div class="text-end small text-muted" style="min-width:140px;">
                                        <div><i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }} &ndash; {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</div>
                                        @if($session->venue_hall)
                                            <div><i class="bi bi-geo-alt me-1"></i>{{ $session->venue_hall }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="bi bi-calendar-x fs-1 text-muted"></i>
                <p class="text-muted mt-3">The detailed program is being finalized. Please check back soon, or seed sample sessions via <code>php artisan db:seed</code>.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
