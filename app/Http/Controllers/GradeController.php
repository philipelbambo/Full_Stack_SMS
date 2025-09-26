<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Services\GradeService;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with('student', 'subject')->latest()->get();

        return view('modules.grades.index', compact('grades'));
    }

    public function createForm()
    {
        $students = Student::all();
        $subjects = Subject::all();

        return view('modules.grades.create', compact('students', 'subjects'));
    }

    public function store(Request $request, GradeService $convert)
    {   
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'grade' => 'required|integer|min:0|max:100'
        ]);

        Grade::create([
            'student_id' => $validated['student_id'],
            'subject_id' => $validated['subject_id'],
            'grade' => $convert->percentageToGpa($validated['grade']),
        ]);

        return redirect()->route('grades.form.store')->with('success', 'Grade created successfully');
    }
}
