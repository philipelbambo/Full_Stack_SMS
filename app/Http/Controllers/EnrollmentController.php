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
        $enrollments = Enrollment::with(['student', 'course'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('modules.enrollment.index', compact('enrollments'));
    }

    public function create()
    {
        return view('modules.enrollment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course_title' => 'required|string|max:255',
            'enrolled_at' => 'nullable|date',
            'status' => 'required|string',
        ]);

        // Find or create student
        $student = Student::firstOrCreate(
            ['name' => $request->student_name],
            [
                'gender' => 'Unknown',
                'email' => strtolower(str_replace(' ', '.', $request->student_name)) . '@example.com',
                'dob' => now()->subYears(18)->format('Y-m-d'),
                'age' => 18,
            ]
        );

        // Find or create course with default code
        $course = Course::firstOrCreate(
            ['title' => $request->course_title],
            [
                'code' => strtoupper(substr($request->course_title, 0, 4)) . rand(100, 999)
            ]
        );

        // Create enrollment
        Enrollment::create([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'enrolled_at' => $request->enrolled_at,
            'status' => $request->status,
        ]);

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment added successfully.');
    }

    public function show(Enrollment $enrollment)
    {
        return view('modules.enrollment.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        return view('modules.enrollment.edit', compact('enrollment'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course_title' => 'required|string|max:255',
            'enrolled_at' => 'nullable|date',
            'status' => 'required|string',
        ]);

        $student = Student::firstOrCreate(
            ['name' => $request->student_name],
            [
                'gender' => 'Unknown',
                'email' => strtolower(str_replace(' ', '.', $request->student_name)) . '@example.com',
                'dob' => now()->subYears(18)->format('Y-m-d'),
                'age' => 18,
            ]
        );

        $course = Course::firstOrCreate(
            ['title' => $request->course_title],
            [
                'code' => strtoupper(substr($request->course_title, 0, 4)) . rand(100, 999)
            ]
        );

        $enrollment->update([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'enrolled_at' => $request->enrolled_at,
            'status' => $request->status,
        ]);

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}
