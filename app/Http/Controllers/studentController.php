<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Student $students)
    {
        return view('modules.students.index', compact('students'));
    }

    public function createForm()
    {
        $departments = Department::all();

        return view('modules.students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'age' => 'required|integer',
            'department_id' => 'required|integer|exists:departments,id',
        ]);

        Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'age' => $validated['age'],
            'department_id' => $validated['department_id'],
        ]);

        return redirect()->route('students.form.store')->with('success', 'Student added successfully');
    }

    public function showGrades($id)
    {
        $student = Student::with('department')->findOrFail($id);

        $grades = Grade::where('student_id', $id)
                    ->with('subject.department')
                    ->latest()
                    ->get();

        $department = $grades->isNotEmpty()
                    ? $grades->first()->subject->department
                    : null;

        return view('modules.students.show', compact('grades', 'student', 'department'));
    }
}
