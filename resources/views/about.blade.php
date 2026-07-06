@extends('layouts.app')

@section('title', 'Theme & About')

@section('content')
<section class="py-5" style="background: var(--rw-dark);">
    <div class="container text-white text-center py-4">
        <p class="eyebrow-mini text-warning">2026 Theme</p>
        <h1 class="fw-bold">"Extractive Industry for Sustainable Futures"</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="section-title mb-3">About Rwanda Mining Week</h2>
                <p>The Rwanda Mines, Petroleum and Gas Board (RMB) brings together stakeholders from the mining,
                quarry, oil and gas sectors &mdash; including international, regional and local government officials,
                investors, upstream and downstream industry actors, researchers, academia and financial institutions
                &mdash; to discuss key opportunities, challenges, and advancements within Rwanda's extractive industry.</p>
                <p>The event serves as a premium platform to responsibly showcase Rwanda's natural resource endowments,
                promote investment, and facilitate high-value networking across the region and beyond.</p>

                <h4 class="fw-bold mt-4">Why attend</h4>
                <ul>
                    <li>Engage directly with policymakers and regulators shaping Rwanda's extractive sector.</li>
                    <li>Meet investors, financiers and technology providers active across Africa's mining value chain.</li>
                    <li>Explore exhibition booths spanning equipment, technology, and services (Halls MH1&ndash;4).</li>
                    <li>Join structured B2B meetings and C-suite sideline discussions.</li>
                    <li>Take part in optional guided site visits to Rwandan mining operations.</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="card-rmw p-4">
                    <h5 class="fw-bold mb-3">Event Snapshot</h5>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><i class="bi bi-calendar-event me-2" style="color:var(--rw-blue)"></i><strong>Dates:</strong> December 9&ndash;11, 2026</li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color:var(--rw-blue)"></i><strong>Venue:</strong> Kigali Convention Centre</li>
                        <li class="mb-2"><i class="bi bi-people me-2" style="color:var(--rw-blue)"></i><strong>Attendance:</strong> 700&ndash;1000 delegates &amp; visitors, 40+ exhibitors</li>
                        <li class="mb-2"><i class="bi bi-diagram-3 me-2" style="color:var(--rw-blue)"></i><strong>Organizer:</strong> Rwanda Mines, Petroleum and Gas Board (RMB)</li>
                        <li class="mb-0"><i class="bi bi-briefcase me-2" style="color:var(--rw-blue)"></i><strong>PCO partner:</strong> Rwanda Convention Bureau (RCB)</li>
                    </ul>
                </div>
                <div class="card-rmw p-4 mt-4">
                    <h5 class="fw-bold mb-3">Event Components</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(['Conference Sessions','Exhibition Booths','B2B Meetings','Site Visits','Networking Events','Gala Dinner','Cocktail Reception'] as $tag)
                            <span class="badge rounded-pill text-bg-light border">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
