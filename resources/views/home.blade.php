@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero-rmw">
    <div class="hero-shape hero-shape-1">@include('partials.brand-mark-svg', ['size' => 220])</div>
    <div class="hero-shape hero-shape-2">@include('partials.brand-mark-svg', ['size' => 110])</div>
    <div class="container">
        <span class="eyebrow">Dec 9–11, 2026 · Kigali Convention Centre</span>
        <h1 class="mt-3 mb-3">Rwanda Mining Week 2026</h1>
        <p class="fs-5 col-lg-8" style="color: rgba(255,255,255,.85);">
            Theme: <strong>"Extractive Industry for Sustainable Futures."</strong>
            Bringing together government, investors, operators and researchers to shape the future of
            Rwanda's mining, quarry, oil and gas sectors.
        </p>
        <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="{{ route('registration.create') }}" class="btn btn-cta btn-lg">Register Now</a>
            <a href="{{ route('program') }}" class="btn btn-outline-light btn-lg">View Program</a>
        </div>
    </div>
</section>

<div class="hero-strip py-4">
    <div class="container">
        <div class="row text-center g-3">
            <div class="col-6 col-md-3 stat"><b class="accent-sky">700–1000</b><span class="small">Delegates &amp; Visitors</span></div>
            <div class="col-6 col-md-3 stat"><b class="accent-orange">{{ $exhibitorCount > 0 ? $exhibitorCount : '40+' }}</b><span class="small">Exhibitors</span></div>
            <div class="col-6 col-md-3 stat"><b class="accent-green">3 Days</b><span class="small">Dec 9–11, 2026</span></div>
            <div class="col-6 col-md-3 stat"><b class="accent-sky">Kigali</b><span class="small">Convention Centre</span></div>
        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <p class="eyebrow-mini mb-2">What to expect</p>
        <h2 class="section-title mb-2">A complete <span class="accent">extractive industry</span> platform</h2>
        <hr class="stripe-divider w-25 ms-0 mb-4">
        @php($accents = ['navy', 'sky', 'orange', 'green'])
        <div class="row g-4">
            @foreach([
                ['bi-mic', 'Conference Sessions', 'Plenary and breakout sessions on policy, investment, and technology across the value chain.'],
                ['bi-grid-3x3-gap', 'Exhibition', 'Dedicated exhibition halls (MH1–4) showcasing equipment, technology and services.'],
                ['bi-people', 'B2B Meetings', 'Structured business-to-business and C-suite sideline meetings in the AD meeting rooms.'],
                ['bi-signpost-split', 'Site Visits', 'Optional guided visits to mining operations across Rwanda.'],
                ['bi-cup-hot', 'Networking &amp; Cocktail', 'Curated networking sessions and an opening cocktail reception.'],
                ['bi-stars', 'Gala Dinner', 'A signature evening celebrating Rwanda\'s extractive industry achievements.'],
            ] as $i => [$icon, $title, $desc])
            @php($accent = $accents[$i % 4])
            <div class="col-md-4">
                <div class="card-rmw top-{{ $accent }} p-4 h-100 reveal" style="transition-delay: {{ $i * 70 }}ms">
                    <i class="bi {{ $icon }} fs-2 mb-3 accent-{{ $accent }}"></i>
                    <h5 class="fw-bold">{{ $title }}</h5>
                    <p class="text-muted small mb-0">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@if($speakers->count())
<section class="py-5 bg-white">
    <div class="container">
        <p class="eyebrow-mini mb-2">Who's speaking</p>
        <h2 class="section-title mb-2">Featured <span class="accent">Speakers</span></h2>
        <hr class="stripe-divider w-25 ms-0 mb-4">
        <div class="row g-4">
            @foreach($speakers as $i => $speaker)
            <div class="col-6 col-md-3">
                <div class="card-rmw h-100 reveal" style="transition-delay: {{ $i * 60 }}ms">
                    <img src="{{ $speaker->photo_url ?: 'https://ui-avatars.com/api/?background=2BA6DE&color=fff&size=256&name='.urlencode($speaker->name) }}" class="speaker-photo" alt="{{ $speaker->name }}">
                    <div class="p-3">
                        <h6 class="fw-bold mb-0">{{ $speaker->name }}</h6>
                        <p class="small text-muted mb-0">{{ $speaker->job_title }}</p>
                        <p class="small text-muted">{{ $speaker->organization }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($sponsors->count())
<section class="py-5">
    <div class="container">
        <p class="eyebrow-mini mb-2">Backed by</p>
        <h2 class="section-title mb-2">Sponsors &amp; <span class="accent">Partners</span></h2>
        <hr class="stripe-divider w-25 ms-0 mb-4">
        @foreach($sponsors as $tier => $group)
        <div class="mb-4">
            <span class="badge badge-tier-{{ $tier }} text-uppercase mb-2">{{ $tier }}</span>
            <div class="row g-4 mt-1">
                @foreach($group as $i => $sponsor)
                <div class="col-6 col-md-3">
                    <a href="{{ $sponsor->website_url ?: '#' }}" class="card-rmw d-flex align-items-center justify-content-center p-4 text-decoration-none reveal" style="height:110px; transition-delay: {{ $i * 60 }}ms">
                        @if($sponsor->logo_url)
                            <img src="{{ $sponsor->logo_url }}" alt="{{ $sponsor->name }}" style="max-height:60px; max-width:100%;">
                        @else
                            <span class="fw-bold text-dark">{{ $sponsor->name }}</span>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

<section class="py-5 text-white reveal" style="background: var(--rw-dark);">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Secure your seat at Rwanda Mining Week 2026</h2>
        <p class="col-lg-6 mx-auto" style="color: rgba(255,255,255,.75);">Delegate, VIP and exhibitor packages available. Online registration and payment take minutes.</p>
        <a href="{{ route('registration.create') }}" class="btn btn-cta btn-lg mt-2">Register Now</a>
    </div>
</section>

@endsection
