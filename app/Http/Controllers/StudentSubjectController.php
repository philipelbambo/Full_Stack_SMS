<?php

namespace App\Http\Controllers;

use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function index()
    {
        $subjects = StudentSubject::latest()->paginate(10);
        return view('modules.student_subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('modules.student_subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:student_subjects,code',
            'credits' => 'required|integer|min:1',
        ]);

        StudentSubject::create($request->all());

        return redirect()->route('student-subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit(StudentSubject $studentSubject)
    {
        return view('modules.student_subjects.edit', compact('studentSubject'));
    }

    public function update(Request $request, StudentSubject $studentSubject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:student_subjects,code,' . $studentSubject->id,
            'credits' => 'required|integer|min:1',
        ]);

        $studentSubject->update($request->all());

        return redirect()->route('student-subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(StudentSubject $studentSubject)
    {
        $studentSubject->delete();

        return redirect()->route('student-subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
