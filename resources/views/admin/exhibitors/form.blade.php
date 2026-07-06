@extends('layouts.admin')

@section('title', $exhibitor->exists ? 'Edit Exhibitor' : 'Add Exhibitor')

@section('content')
<div class="card-rmw p-4" style="max-width:640px;">
    <form method="POST" action="{{ $exhibitor->exists ? route('admin.exhibitors.update', $exhibitor) : route('admin.exhibitors.store') }}">
        @csrf
        @if($exhibitor->exists) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Company name *</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $exhibitor->company_name) }}" required>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Booth number</label>
                <input type="text" name="booth_number" class="form-control" value="{{ old('booth_number', $exhibitor->booth_number) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ old('country', $exhibitor->country) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Logo URL</label>
                <input type="url" name="logo_url" class="form-control" value="{{ old('logo_url', $exhibitor->logo_url) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Website URL</label>
                <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $exhibitor->website_url) }}">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $exhibitor->description) }}</textarea>
        </div>

        <button class="btn btn-rmw-primary">{{ $exhibitor->exists ? 'Save changes' : 'Add exhibitor' }}</button>
        <a href="{{ route('admin.exhibitors.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
@endsection
