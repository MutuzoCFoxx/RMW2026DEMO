<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | RMW 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body style="background: var(--rw-dark); min-height:100vh;" class="d-flex align-items-center">
<div class="container" style="max-width:420px;">
    <div class="text-center mb-4">
        <div class="d-flex justify-content-center mb-2">@include('partials.brand-mark-svg', ['size' => 44])</div>
        <h3 class="text-white fw-bold">RMW<span class="text-brand-accent">2026</span></h3>
        <p class="text-white-50 small">Admin Console</p>
    </div>
    <div class="card-rmw p-4">
        @if($errors->any())
            <div class="alert alert-danger small">
                @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('admin.login.attempt') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label small" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-rmw-primary w-100">Sign in</button>
        </form>
    </div>
    <p class="text-center text-white-50 small mt-3">Demo credentials: admin@rmw2026.rw / password</p>
</div>
</body>
</html>
