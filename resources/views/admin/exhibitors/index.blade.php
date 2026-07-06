@extends('layouts.admin')

@section('title', 'Exhibitors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Manage exhibitor booths for the exhibition halls (MH1&ndash;4).</p>
    <a href="{{ route('admin.exhibitors.create') }}" class="btn btn-rmw-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Add Exhibitor</a>
</div>

<div class="card-rmw p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Company</th><th>Booth</th><th>Country</th><th>Website</th><th></th></tr></thead>
            <tbody>
                @forelse($exhibitors as $exhibitor)
                <tr>
                    <td class="fw-semibold">{{ $exhibitor->company_name }}</td>
                    <td>{{ $exhibitor->booth_number }}</td>
                    <td>{{ $exhibitor->country }}</td>
                    <td>{{ $exhibitor->website_url }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.exhibitors.edit', $exhibitor) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.exhibitors.destroy', $exhibitor) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this exhibitor?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No exhibitors yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{ $exhibitors->links() }}
@endsection
