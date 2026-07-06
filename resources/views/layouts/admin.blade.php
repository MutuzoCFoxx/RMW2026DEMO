<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | RMW Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <aside class="admin-sidebar p-3" style="width:250px; flex-shrink:0;">
        <a href="{{ route('admin.dashboard') }}" class="d-block text-white fw-bold fs-5 mb-4 text-decoration-none">RMW<span class="text-warning">2026</span> Admin</a>
        <nav class="nav flex-column gap-1">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
            <a class="nav-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}" href="{{ route('admin.registrations.index') }}"><i class="bi bi-person-lines-fill me-2"></i>Registrations</a>
            <a class="nav-link {{ request()->routeIs('admin.speakers.*') ? 'active' : '' }}" href="{{ route('admin.speakers.index') }}"><i class="bi bi-mic me-2"></i>Speakers</a>
            <a class="nav-link {{ request()->routeIs('admin.sponsors.*') ? 'active' : '' }}" href="{{ route('admin.sponsors.index') }}"><i class="bi bi-award me-2"></i>Sponsors</a>
            <a class="nav-link {{ request()->routeIs('admin.exhibitors.*') ? 'active' : '' }}" href="{{ route('admin.exhibitors.index') }}"><i class="bi bi-shop me-2"></i>Exhibitors</a>
            <a class="nav-link {{ request()->routeIs('admin.program.*') ? 'active' : '' }}" href="{{ route('admin.program.index') }}"><i class="bi bi-calendar3 me-2"></i>Program</a>
            <hr class="border-secondary">
            <a class="nav-link" href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right me-2"></i>View site</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="nav-link border-0 bg-transparent text-start w-100 p-0"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
            </form>
        </nav>
    </aside>

    <main class="flex-grow-1">
        <div class="admin-topbar px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">@yield('title', 'Dashboard')</h5>
            <span class="small text-muted">{{ Auth::user()->name ?? '' }}</span>
        </div>
        <div class="p-4">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
