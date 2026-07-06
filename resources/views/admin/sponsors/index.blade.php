@extends('layouts.admin')

@section('title', 'Sponsors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Manage sponsors &amp; partners shown on the homepage.</p>
    <a href="{{ route('admin.sponsors.create') }}" class="btn btn-rmw-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Add Sponsor</a>
</div>

<div class="card-rmw p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th></th><th>Name</th><th>Tier</th><th>Website</th><th></th></tr></thead>
            <tbody>
                @forelse($sponsors as $sponsor)
                <tr>
                    <td>@if($sponsor->logo_url)<img src="{{ $sponsor->logo_url }}" style="height:32px;">@endif</td>
                    <td class="fw-semibold">{{ $sponsor->name }}</td>
                    <td><span class="badge badge-tier-{{ $sponsor->tier }} text-uppercase">{{ $sponsor->tier }}</span></td>
                    <td>{{ $sponsor->website_url }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.sponsors.edit', $sponsor) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this sponsor?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No sponsors yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{ $sponsors->links() }}
@endsection
