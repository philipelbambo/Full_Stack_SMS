<?php

namespace App\Http\Controllers;

use App\Models\Archived;
use Illuminate\Http\Request;

class ArchivedController extends Controller
{
    public function index()
    {
        $archiveds = Archived::latest()->get();
        return view('modules.archived.index', compact('archiveds'));
    }

    public function create()
    {
        return view('modules.archived.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'archived_by' => 'nullable|string',
        ]);

        Archived::create($request->all());

        return redirect()->route('archived.index')->with('success', 'Archived record created successfully.');
    }

    public function show(Archived $archived)
    {
        return view('modules.archived.show', compact('archived'));
    }

    public function edit(Archived $archived)
    {
        return view('modules.archived.edit', compact('archived'));
    }

    public function update(Request $request, Archived $archived)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'archived_by' => 'nullable|string',
        ]);

        $archived->update($request->all());

        return redirect()->route('archived.index')->with('success', 'Archived record updated successfully.');
    }

    public function destroy(Archived $archived)
    {
        $archived->delete();

        return redirect()->route('archived.index')->with('success', 'Archived record deleted successfully.');
    }
}
