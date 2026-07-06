<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExhibitorRequest;
use App\Models\Exhibitor;

class ExhibitorController extends Controller
{
    public function index()
    {
        $exhibitors = Exhibitor::orderBy('company_name')->paginate(15);

        return view('admin.exhibitors.index', compact('exhibitors'));
    }

    public function create()
    {
        return view('admin.exhibitors.form', ['exhibitor' => new Exhibitor]);
    }

    public function store(ExhibitorRequest $request)
    {
        Exhibitor::create($request->validated());

        return redirect()->route('admin.exhibitors.index')->with('status', 'Exhibitor added.');
    }

    public function edit(Exhibitor $exhibitor)
    {
        return view('admin.exhibitors.form', compact('exhibitor'));
    }

    public function update(ExhibitorRequest $request, Exhibitor $exhibitor)
    {
        $exhibitor->update($request->validated());

        return redirect()->route('admin.exhibitors.index')->with('status', 'Exhibitor updated.');
    }

    public function destroy(Exhibitor $exhibitor)
    {
        $exhibitor->delete();

        return back()->with('status', 'Exhibitor removed.');
    }
}
