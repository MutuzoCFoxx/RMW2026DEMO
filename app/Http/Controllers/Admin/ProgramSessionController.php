<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramSessionRequest;
use App\Models\ProgramSession;

class ProgramSessionController extends Controller
{
    public function index()
    {
        $sessions = ProgramSession::orderBy('session_date')->orderBy('start_time')->paginate(20);

        return view('admin.program.index', compact('sessions'));
    }

    public function create()
    {
        return view('admin.program.form', ['program_session' => new ProgramSession]);
    }

    public function store(ProgramSessionRequest $request)
    {
        ProgramSession::create($request->validated());

        return redirect()->route('admin.program.index')->with('status', 'Session added.');
    }

    public function edit(ProgramSession $program_session)
    {
        return view('admin.program.form', compact('program_session'));
    }

    public function update(ProgramSessionRequest $request, ProgramSession $program_session)
    {
        $program_session->update($request->validated());

        return redirect()->route('admin.program.index')->with('status', 'Session updated.');
    }

    public function destroy(ProgramSession $program_session)
    {
        $program_session->delete();

        return back()->with('status', 'Session removed.');
    }
}
