<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rwanda Mining Week 2026') | RMW 2026</title>
    <meta name="description" content="Rwanda Mining Week 2026 — Extractive Industry for Sustainable Futures. December 9–11, 2026, Kigali Convention Centre.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-rmw py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand brand-mark" href="{{ route('home') }}">
            @include('partials.brand-mark-svg', ['size' => 34])
            RMW<span>2026</span>
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Theme &amp; About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('program') ? 'active' : '' }}" href="{{ route('program') }}">Program</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('venue') ? 'active' : '' }}" href="{{ route('venue') }}">Venue</a></li>
                <li class="nav-item ms-lg-2"><a class="btn btn-nav-outline" href="mailto:info@rwandaminingweek.rw?subject=Sponsorship%20%26%20Exhibition%20Enquiry">Exhibit &amp; Sponsor</a></li>
                <li class="nav-item ms-lg-2"><a class="btn btn-cta" href="{{ route('registration.create') }}">Register Now</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer-rmw pt-5 pb-4 mt-5">
    <hr class="stripe-divider w-100 m-0 rounded-0" style="height:5px;">
    <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="text-white fw-bold">Rwanda Mining Week <span class="text-brand-accent">2026</span></h5>
                <p class="small">Extractive Industry for Sustainable Futures.<br>December 9–11, 2026 · Kigali Convention Centre, Rwanda.</p>
            </div>
            <div class="col-md-2">
                <h6>Explore</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('about') }}">Theme &amp; About</a></li>
                    <li><a href="{{ route('program') }}">Program</a></li>
                    <li><a href="{{ route('venue') }}">Venue</a></li>
                    <li><a href="{{ route('registration.create') }}">Register</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>Organized by</h6>
                <p class="small mb-1">Rwanda Mines, Petroleum and Gas Board (RMB)</p>
                <p class="small">In partnership with the Rwanda Convention Bureau (RCB)</p>
            </div>
            <div class="col-md-3">
                <h6>Contact</h6>
                <p class="small mb-1"><i class="bi bi-envelope me-1"></i> info@rwandaminingweek.rw</p>
                <p class="small mb-1"><i class="bi bi-geo-alt me-1"></i> Kigali Convention Centre, Rwanda</p>
                <p class="small text-warning-emphasis"><i class="bi bi-info-circle me-1"></i> Demo site — details illustrative.</p>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <p class="small mb-0 text-center">&copy; {{ date('Y') }} Planet Events Group. Demo build prepared for tender submission RCB/004/6/2026.</p>
    </div>
</footer>

<button type="button" class="back-to-top" id="backToTop" aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var revealTargets = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window && revealTargets.length) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });
            revealTargets.forEach(function (el) { observer.observe(el); });
        } else {
            revealTargets.forEach(function (el) { el.classList.add('is-visible'); });
        }

        var backToTop = document.getElementById('backToTop');
        if (backToTop) {
            window.addEventListener('scroll', function () {
                backToTop.classList.toggle('is-visible', window.scrollY > 400);
            });
            backToTop.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });
</script>
</body>
</html>
