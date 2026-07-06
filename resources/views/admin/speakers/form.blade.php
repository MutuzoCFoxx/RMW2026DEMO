@extends('layouts.admin')

@section('title', $speaker->exists ? 'Edit Speaker' : 'Add Speaker')

@section('content')
<div class="card-rmw p-4" style="max-width:640px;">
    <form method="POST" action="{{ $speaker->exists ? route('admin.speakers.update', $speaker) : route('admin.speakers.store') }}">
        @csrf
        @if($speaker->exists) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Full name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $speaker->name) }}" required>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Job title</label>
                <input type="text" name="job_title" class="form-control" value="{{ old('job_title', $speaker->job_title) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Organization</label>
                <input type="text" name="organization" class="form-control" value="{{ old('organization', $speaker->organization) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ old('country', $speaker->country) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Photo URL</label>
                <input type="url" name="photo_url" class="form-control" value="{{ old('photo_url', $speaker->photo_url) }}" placeholder="https://...">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3">{{ old('bio', $speaker->bio) }}</textarea>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="is_keynote" value="1" class="form-check-input" id="is_keynote" {{ old('is_keynote', $speaker->is_keynote) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_keynote">Keynote speaker</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Sort order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $speaker->sort_order ?? 0) }}" style="max-width:120px;">
        </div>

        <button class="btn btn-rmw-primary">{{ $speaker->exists ? 'Save changes' : 'Add speaker' }}</button>
        <a href="{{ route('admin.speakers.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
@endsection
