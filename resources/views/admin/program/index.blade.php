@extends('layouts.admin')

@section('title', 'Program')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Manage the conference agenda across all three days.</p>
    <a href="{{ route('admin.program.create') }}" class="btn btn-rmw-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Add Session</a>
</div>

<div class="card-rmw p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Date</th><th>Time</th><th>Title</th><th>Type</th><th>Hall</th><th></th></tr></thead>
            <tbody>
                @forelse($sessions as $session)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($session->session_date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }}&ndash;{{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</td>
                    <td class="fw-semibold">{{ $session->title }}</td>
                    <td><span class="badge text-bg-light border text-capitalize">{{ str_replace('_',' ',$session->session_type) }}</span></td>
                    <td>{{ $session->venue_hall }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.program.edit', $session) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.program.destroy', $session) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this session?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No sessions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{ $sessions->links() }}
@endsection
