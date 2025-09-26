<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('id', 'desc')->get();
        return view('modules.sections.index', compact('sections'));
    }

    public function create()
    {
        return view('modules.sections.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
        ]);

        Section::create($data);

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    public function edit(Section $section)
    {
        return view('modules.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
        ]);

        $section->update($data);

        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
