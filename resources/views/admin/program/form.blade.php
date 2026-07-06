@extends('layouts.admin')

@section('title', $program_session->exists ? 'Edit Session' : 'Add Session')

@section('content')
<div class="card-rmw p-4" style="max-width:680px;">
    <form method="POST" action="{{ $program_session->exists ? route('admin.program.update', $program_session) : route('admin.program.store') }}">
        @csrf
        @if($program_session->exists) @method('PUT') @endif

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Date *</label>
                <input type="date" name="session_date" class="form-control" value="{{ old('session_date', optional($program_session->session_date)->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Start time *</label>
                <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $program_session->start_time) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">End time *</label>
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $program_session->end_time) }}" required>
            </div>
            <div class="col-12">
                <label class="form-label">Session title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $program_session->title) }}" required>
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $program_session->description) }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Session type *</label>
                <select name="session_type" class="form-select" required>
                    @foreach(['plenary','breakout','exhibition','networking','gala','site_visit','break'] as $type)
                        <option value="{{ $type }}" {{ old('session_type', $program_session->session_type) === $type ? 'selected' : '' }}>{{ ucfirst(str_replace('_',' ',$type)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Venue / Hall</label>
                <input type="text" name="venue_hall" class="form-control" value="{{ old('venue_hall', $program_session->venue_hall) }}" placeholder="e.g. Auditorium">
            </div>
            <div class="col-md-4">
                <label class="form-label">Speaker name</label>
                <input type="text" name="speaker_name" class="form-control" value="{{ old('speaker_name', $program_session->speaker_name) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Sort order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $program_session->sort_order ?? 0) }}">
            </div>
        </div>

        <button class="btn btn-rmw-primary mt-4">{{ $program_session->exists ? 'Save changes' : 'Add session' }}</button>
        <a href="{{ route('admin.program.index') }}" class="btn btn-outline-secondary mt-4">Cancel</a>
    </form>
</div>
@endsection
