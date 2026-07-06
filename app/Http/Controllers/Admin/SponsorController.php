<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SponsorRequest;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::orderBy('tier')->orderBy('sort_order')->paginate(15);

        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.sponsors.form', ['sponsor' => new Sponsor]);
    }

    public function store(SponsorRequest $request)
    {
        Sponsor::create($request->validated());

        return redirect()->route('admin.sponsors.index')->with('status', 'Sponsor added.');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.form', compact('sponsor'));
    }

    public function update(SponsorRequest $request, Sponsor $sponsor)
    {
        $sponsor->update($request->validated());

        return redirect()->route('admin.sponsors.index')->with('status', 'Sponsor updated.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return back()->with('status', 'Sponsor removed.');
    }
}
