@extends('layouts.admin')

@section('title', 'Speakers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Manage speaker profiles shown on the homepage.</p>
    <a href="{{ route('admin.speakers.create') }}" class="btn btn-rmw-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Add Speaker</a>
</div>

<div class="card-rmw p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th></th><th>Name</th><th>Title</th><th>Organization</th><th>Keynote</th><th></th></tr></thead>
            <tbody>
                @forelse($speakers as $speaker)
                <tr>
                    <td><img src="{{ $speaker->photo_url ?: 'https://ui-avatars.com/api/?name='.urlencode($speaker->name) }}" style="width:40px;height:40px;object-fit:cover;border-radius:50%;"></td>
                    <td class="fw-semibold">{{ $speaker->name }}</td>
                    <td>{{ $speaker->job_title }}</td>
                    <td>{{ $speaker->organization }}</td>
                    <td>{!! $speaker->is_keynote ? '<span class="badge text-bg-warning">Keynote</span>' : '' !!}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.speakers.edit', $speaker) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.speakers.destroy', $speaker) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this speaker?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No speakers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{ $speakers->links() }}
@endsection
