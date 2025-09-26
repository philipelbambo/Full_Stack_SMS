<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'course'])->latest()->get();
        return view('modules.enrollment.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $courses  = Course::orderBy('title')->get();

        return view('modules.enrollment.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|exists:students,id',
            'course_id'   => 'required|exists:courses,id',
            'enrolled_at' => 'required|date',
            'status'      => 'required|string',
        ]);

        Enrollment::create($request->all());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment created successfully!');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::orderBy('name')->get();
        $courses  = Course::orderBy('title')->get();
        return view('modules.enrollment.edit', compact('enrollment', 'students', 'courses'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'student_id'  => 'required|exists:students,id',
            'course_id'   => 'required|exists:courses,id',
            'enrolled_at' => 'required|date',
            'status'      => 'required|string',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully!');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully!');
    }
}
