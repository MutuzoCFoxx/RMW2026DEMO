@extends('layouts.app')

@section('title', 'Venue')

@section('content')
<section class="py-5" style="background: var(--rw-dark);">
    <div class="container text-white text-center py-4">
        <p class="eyebrow-mini">Where it happens</p>
        <h1 class="fw-bold">Kigali Convention Centre</h1>
        <p style="color: rgba(255,255,255,.75);">KG 2 Roundabout, Kigali, Rwanda</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="ratio ratio-21x9 rounded-4 overflow-hidden mb-5 shadow-sm">
            <iframe
                src="https://www.google.com/maps?q=Kigali%20Convention%20Centre&output=embed"
                style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <h2 class="section-title mb-4">Venue &amp; hall allocation</h2>
        <div class="table-responsive">
            <table class="table align-middle card-rmw">
                <thead class="table-light">
                    <tr><th>Space</th><th>Hall / Room</th><th>Purpose</th></tr>
                </thead>
                <tbody>
                    <tr><td>Plenary &amp; Opening</td><td>Auditorium</td><td>Main conference sessions and opening ceremony</td></tr>
                    <tr><td>Exhibition</td><td>MH1, MH2, MH3 &amp; MH4</td><td>40+ exhibitor booths and displays</td></tr>
                    <tr><td>Gala Dinner</td><td>MH (between MH2 &amp; MH3)</td><td>Evening gala and awards</td></tr>
                    <tr><td>Registration &amp; Accreditation</td><td>Foyer 1A</td><td>Badge collection, QR scanning</td></tr>
                    <tr><td>B2B &amp; Breakout Sessions</td><td>AD4&ndash;AD12</td><td>Side meetings, C-suite sideline discussions</td></tr>
                </tbody>
            </table>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="card-rmw top-sky p-4 h-100 reveal">
                    <i class="bi bi-airplane fs-3 mb-2 accent-sky"></i>
                    <h6 class="fw-bold">Getting there</h6>
                    <p class="small text-muted mb-0">Kigali International Airport is approximately 15 minutes from the Convention Centre. Airport ushers and protocol support will be available for delegates.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-rmw top-orange p-4 h-100 reveal" style="transition-delay: 70ms">
                    <i class="bi bi-building fs-3 mb-2 accent-orange"></i>
                    <h6 class="fw-bold">Accommodation</h6>
                    <p class="small text-muted mb-0">Preferred hotel partnerships near the venue will be shared with confirmed delegates and speakers ahead of the event.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-rmw top-green p-4 h-100 reveal" style="transition-delay: 140ms">
                    <i class="bi bi-shield-check fs-3 mb-2 accent-green"></i>
                    <h6 class="fw-bold">Security &amp; Access</h6>
                    <p class="small text-muted mb-0">QR-coded badges and dedicated accreditation counters manage secure access throughout the venue.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
