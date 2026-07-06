@extends('layouts.app')

@section('title', 'Theme & About')

@section('content')
<section class="py-5" style="background: var(--rw-dark);">
    <div class="container text-white text-center py-4">
        <p class="eyebrow-mini">2026 Theme</p>
        <h1 class="fw-bold">"Extractive Industry for Sustainable Futures"</h1>
        <p style="color: rgba(255,255,255,.7);" class="col-lg-8 mx-auto mb-0">
            Rwanda Mining Week 2026 is the flagship gathering of the Rwanda Mines, Petroleum and Gas Board (RMB),
            convening government, investors, operators and researchers to shape the future of Rwanda's extractive industry.
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-start mb-5">
            <div class="col-lg-7">
                <p class="eyebrow-mini mb-2">Background</p>
                <h2 class="section-title mb-3">About Rwanda Mining Week</h2>
                <p>The Rwanda Mines, Petroleum and Gas Board (RMB) brings together stakeholders from the mining,
                quarry, oil and gas sectors &mdash; including international, regional and local government officials,
                investors, upstream and downstream industry actors, researchers, academia and financial institutions
                &mdash; to discuss key opportunities, challenges, and advancements within Rwanda's extractive industry.</p>
                <p>The event serves as a premium platform to responsibly showcase Rwanda's natural resource endowments,
                promote investment, and facilitate high-value networking across the region and beyond.</p>
                <p>Rwanda's mining sector has grown into one of the country's leading export earners over the past
                decade, and Rwanda Mining Week reflects the country's ambition to pair that growth with responsible,
                transparent and sustainable resource management &mdash; positioning Kigali as a serious convening point
                for extractive-industry dialogue in the Great Lakes region and across Africa.</p>
            </div>
            <div class="col-lg-5">
                <div class="card-rmw card-accent p-4 reveal">
                    <h5 class="fw-bold mb-3" style="color: var(--rw-dark);">Conference Theme</h5>
                    <blockquote class="mb-4">"Extractive Industry for Sustainable Futures"</blockquote>
                    <h6 class="fw-bold mb-2" style="color: var(--rw-dark);">Key Objectives</h6>
                    <div>
                        @foreach([
                            'Attract global investment into Rwanda\'s mining, quarry, oil and gas sectors',
                            'Promote responsible, transparent and sustainable resource development',
                            'Strengthen regional cooperation across the Great Lakes mining corridor',
                            'Advance geological research, innovation and technology transfer',
                            'Build local capacity and skills across the extractive value chain',
                        ] as $objective)
                            <div class="obj-list-item"><span class="arrow">&rarr;</span>{{ $objective }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="stat-banner text-center mb-5 reveal">
            <p class="eyebrow-mini mb-2" style="color: rgba(255,255,255,.6);">Why Rwanda</p>
            <h2 class="fw-bold mb-2">Africa's fastest-growing convening hub</h2>
            <p class="col-lg-7 mx-auto mb-4" style="color: rgba(255,255,255,.65); font-size: .95rem;">
                Rwanda has positioned itself as a leading MICE (meetings, incentives, conferences and exhibitions)
                destination in Africa, pairing world-class infrastructure with a fast-growing extractive sector.
            </p>
            <div class="row g-4">
                @foreach([
                    ['#1', 'MICE Destination in Africa', 'ICCA-ranked convention market'],
                    ['30 min', 'Airport to KCC', 'Kigali International Airport transfer time'],
                    ['Top 3', 'Ease of Doing Business in Africa', 'World Bank ranking'],
                    ['Safe & Stable', 'Business Climate', 'Consistently ranked across the region'],
                ] as [$num, $label, $sub])
                <div class="col-6 col-md-3">
                    <div class="stat-num">{{ $num }}</div>
                    <div class="stat-label">{{ $label }}</div>
                    <div class="stat-sub">{{ $sub }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card-rmw p-4 h-100 reveal">
                    <h5 class="fw-bold mb-3">Event Snapshot</h5>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><i class="bi bi-calendar-event me-2" style="color:var(--rw-blue)"></i><strong>Dates:</strong> December 9&ndash;11, 2026</li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color:var(--rw-blue)"></i><strong>Venue:</strong> Kigali Convention Centre</li>
                        <li class="mb-2"><i class="bi bi-people me-2" style="color:var(--rw-blue)"></i><strong>Attendance:</strong> 700&ndash;1000 delegates &amp; visitors, 40+ exhibitors</li>
                        <li class="mb-2"><i class="bi bi-diagram-3 me-2" style="color:var(--rw-blue)"></i><strong>Organizer:</strong> Rwanda Mines, Petroleum and Gas Board (RMB)</li>
                        <li class="mb-0"><i class="bi bi-briefcase me-2" style="color:var(--rw-blue)"></i><strong>PCO partner:</strong> Rwanda Convention Bureau (RCB)</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-rmw p-4 h-100 reveal">
                    <h5 class="fw-bold mb-3">Why attend</h5>
                    <ul class="small mb-0 ps-3">
                        <li class="mb-2">Engage directly with policymakers and regulators shaping Rwanda's extractive sector.</li>
                        <li class="mb-2">Meet investors, financiers and technology providers active across Africa's mining value chain.</li>
                        <li class="mb-2">Explore exhibition booths spanning equipment, technology, and services (Halls MH1&ndash;4).</li>
                        <li class="mb-2">Join structured B2B meetings and C-suite sideline discussions.</li>
                        <li class="mb-0">Take part in optional guided site visits to Rwandan mining operations.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-rmw p-4 mb-5 reveal">
            <h5 class="fw-bold mb-3">Event Components</h5>
            <div class="d-flex flex-wrap gap-2">
                @foreach(['Conference Sessions','Exhibition Booths','B2B Meetings','Site Visits','Networking Events','Gala Dinner','Cocktail Reception'] as $tag)
                    <span class="badge rounded-pill text-bg-light border">{{ $tag }}</span>
                @endforeach
            </div>
        </div>

        <div class="text-center reveal">
            <p class="eyebrow-mini mb-2">Organised By</p>
            <h2 class="section-title mb-2">Under the auspices of</h2>
            <p class="text-muted small mb-4">Rwanda's national institutions for mining, petroleum and gas development</p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                @foreach(['Rwanda Mines, Petroleum and Gas Board (RMB)', 'Rwanda Convention Bureau (RCB)', 'Rwanda Development Board (RDB)'] as $org)
                    <div class="org-badge">{{ $org }}</div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
