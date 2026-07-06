@extends('layouts.admin')

@section('title', 'Registrations')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <form class="d-flex gap-2" method="GET">
        <input type="text" name="search" class="form-control" placeholder="Search name, email, reference" value="{{ request('search') }}">
        <select name="status" class="form-select" style="max-width:160px;">
            <option value="">All statuses</option>
            @foreach(['pending','paid','failed'] as $status)
                <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-secondary">Filter</button>
    </form>
    <a href="{{ route('admin.registrations.export') }}" class="btn btn-rmw-primary btn-sm"><i class="bi bi-download me-1"></i>Export CSV</a>
</div>

<div class="card-rmw p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Reference</th><th>Name</th><th>Type</th><th>Ticket</th><th>Amount</th><th>Status</th><th>Date</th><th></th></tr></thead>
            <tbody>
                @forelse($registrations as $r)
                <tr>
                    <td>{{ $r->reference }}</td>
                    <td>{{ $r->full_name }}<br><span class="small text-muted">{{ $r->email }}</span></td>
                    <td class="text-capitalize">{{ $r->delegate_type }}</td>
                    <td class="text-capitalize">{{ str_replace('_',' ',$r->ticket_type) }}</td>
                    <td>{{ number_format($r->amount) }}</td>
                    <td><span class="badge text-bg-{{ $r->payment_status === 'paid' ? 'success' : ($r->payment_status === 'failed' ? 'danger' : 'secondary') }}">{{ $r->payment_status }}</span></td>
                    <td class="small text-muted">{{ $r->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.registrations.show', $r) }}" class="btn btn-sm btn-outline-secondary">View</a></td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">No registrations found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{ $registrations->links() }}
@endsection
