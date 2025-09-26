<?php

namespace App\Http\Controllers;

use App\Models\AssignedSubject;
use Illuminate\Http\Request;

class AssignedSubjectController extends Controller
{
    public function index()
    {
        $assignedSubjects = AssignedSubject::all();
        return view('modules.assigned-subjects.index', compact('assignedSubjects'));
    }

    public function create()
    {
        return view('modules.assigned-subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255',
            'subject_name' => 'required|string|max:255',
            'course' => 'nullable|string|max:255',
            'semester' => 'nullable|string|max:255',
        ]);

        AssignedSubject::create($request->all());

        return redirect()->route('assigned-subjects.index')->with('success', 'Assigned Subject created successfully.');
    }

    public function edit(AssignedSubject $assignedSubject)
    {
        return view('modules.assigned-subjects.edit', compact('assignedSubject'));
    }

    public function update(Request $request, AssignedSubject $assignedSubject)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255',
            'subject_name' => 'required|string|max:255',
            'course' => 'nullable|string|max:255',
            'semester' => 'nullable|string|max:255',
        ]);

        $assignedSubject->update($request->all());

        return redirect()->route('assigned-subjects.index')->with('success', 'Assigned Subject updated successfully.');
    }

    public function destroy(AssignedSubject $assignedSubject)
    {
        $assignedSubject->delete();
        return redirect()->route('assigned-subjects.index')->with('success', 'Assigned Subject deleted successfully.');
    }
}
