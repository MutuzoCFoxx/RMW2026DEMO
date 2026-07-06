@extends('layouts.admin')

@section('title', $sponsor->exists ? 'Edit Sponsor' : 'Add Sponsor')

@section('content')
<div class="card-rmw p-4" style="max-width:640px;">
    <form method="POST" action="{{ $sponsor->exists ? route('admin.sponsors.update', $sponsor) : route('admin.sponsors.store') }}">
        @csrf
        @if($sponsor->exists) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $sponsor->name) }}" required>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Logo URL</label>
                <input type="url" name="logo_url" class="form-control" value="{{ old('logo_url', $sponsor->logo_url) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Website URL</label>
                <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $sponsor->website_url) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Tier *</label>
                <select name="tier" class="form-select" required>
                    @foreach(['platinum','gold','silver','partner'] as $tier)
                        <option value="{{ $tier }}" {{ old('tier', $sponsor->tier) === $tier ? 'selected' : '' }}>{{ ucfirst($tier) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Sort order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $sponsor->sort_order ?? 0) }}">
            </div>
        </div>

        <button class="btn btn-rmw-primary mt-4">{{ $sponsor->exists ? 'Save changes' : 'Add sponsor' }}</button>
        <a href="{{ route('admin.sponsors.index') }}" class="btn btn-outline-secondary mt-4">Cancel</a>
    </form>
</div>
@endsection
