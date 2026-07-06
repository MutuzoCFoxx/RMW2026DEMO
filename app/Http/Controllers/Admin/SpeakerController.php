<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpeakerRequest;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::orderBy('sort_order')->paginate(15);

        return view('admin.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('admin.speakers.form', ['speaker' => new Speaker]);
    }

    public function store(SpeakerRequest $request)
    {
        Speaker::create($request->validated());

        return redirect()->route('admin.speakers.index')->with('status', 'Speaker added.');
    }

    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.form', compact('speaker'));
    }

    public function update(SpeakerRequest $request, Speaker $speaker)
    {
        $speaker->update($request->validated());

        return redirect()->route('admin.speakers.index')->with('status', 'Speaker updated.');
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();

        return back()->with('status', 'Speaker removed.');
    }
}
