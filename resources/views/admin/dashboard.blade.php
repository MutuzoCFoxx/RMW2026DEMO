@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    @foreach([
        ['bi-person-lines-fill', 'Registrations', $stats['registrations'], 'navy'],
        ['bi-check-circle', 'Paid', $stats['paid_registrations'], 'green'],
        ['bi-cash-stack', 'Revenue (RWF)', number_format($stats['revenue']), 'orange'],
        ['bi-mic', 'Speakers', $stats['speakers'], 'sky'],
        ['bi-award', 'Sponsors', $stats['sponsors'], 'orange'],
        ['bi-shop', 'Exhibitors', $stats['exhibitors'], 'sky'],
    ] as [$icon, $label, $value, $accent])
    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card top-{{ $accent }} p-3 bg-white h-100">
            <i class="bi {{ $icon }} fs-4 accent-{{ $accent }}"></i>
            <b class="d-block mt-2 accent-{{ $accent }}">{{ $value }}</b>
            <span class="text-muted small">{{ $label }}</span>
        </div>
    </div>
    @endforeach
</div>

<div class="card-rmw p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Recent registrations</h6>
        <a href="{{ route('admin.registrations.index') }}" class="small">View all &rarr;</a>
    </div>
    <div class="table-responsive">
        <table class="table table-sm align-middle">
            <thead><tr><th>Reference</th><th>Name</th><th>Ticket</th><th>Status</th><th>Date</th></tr></thead>
            <tbody>
                @forelse($recentRegistrations as $r)
                <tr>
                    <td><a href="{{ route('admin.registrations.show', $r) }}">{{ $r->reference }}</a></td>
                    <td>{{ $r->full_name }}</td>
                    <td class="text-capitalize">{{ str_replace('_',' ',$r->ticket_type) }}</td>
                    <td><span class="badge text-bg-{{ $r->payment_status === 'paid' ? 'success' : 'secondary' }}">{{ $r->payment_status }}</span></td>
                    <td class="small text-muted">{{ $r->created_at->format('d M, H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-muted text-center py-3">No registrations yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
