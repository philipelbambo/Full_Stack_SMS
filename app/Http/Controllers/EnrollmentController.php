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
        $students = Student::all();
        return view('modules.enrollment.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'   => 'nullable|exists:students,id',
            'student_name' => 'required_without:student_id|string|max:255',
            'course_title' => 'required|string|max:255',
            'course_code'  => 'nullable|string|max:20',
            'instructor_name' => 'nullable|string|max:255',
            'credits' => 'nullable|integer',
            'duration_weeks' => 'nullable|integer',
            'enrolled_at'  => 'nullable|date',
            'status'       => 'required|string|max:50',
        ]);

        // Use existing student or create new one
        $student = $request->student_id 
            ? Student::find($request->student_id)
            : Student::firstOrCreate(
                ['name' => $request->student_name],
                [
                    'gender' => 'Unknown',
                    'email' => strtolower(str_replace(' ', '.', $request->student_name)) . '@example.com',
                    'dob' => now()->subYears(18)->format('Y-m-d'),
                    'age' => 18,
                ]
            );

        // Use existing course or create new one
        $course = Course::firstOrCreate(
            ['title' => $request->course_title],
            [
                'code' => $request->course_code ?? strtoupper(substr($request->course_title, 0, 4)) . rand(100, 999),
                'instructor_name' => $request->instructor_name ?? 'TBA', // Fixed here
                'credits' => $request->credits ?? 3,
                'duration_weeks' => $request->duration_weeks ?? 16,
                'is_active' => $request->is_active ?? false,
            ]
        );

        // Create enrollment
        Enrollment::create([
            'student_id' => $student->id,
            'course_id'  => $course->id,
            'enrolled_at' => $request->enrolled_at ?? now(),
            'status'     => $request->status,
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
        $students = Student::all();
        return view('modules.enrollment.edit', compact('enrollment', 'students'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'student_id'   => 'nullable|exists:students,id',
            'student_name' => 'required_without:student_id|string|max:255',
            'course_title' => 'required|string|max:255',
            'course_code'  => 'nullable|string|max:20',
            'instructor_name' => 'nullable|string|max:255',
            'credits' => 'nullable|integer',
            'duration_weeks' => 'nullable|integer',
            'enrolled_at'  => 'nullable|date',
            'status'       => 'required|string|max:50',
        ]);

        $student = $request->student_id 
            ? Student::find($request->student_id)
            : Student::firstOrCreate(
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
                'code' => $request->course_code ?? strtoupper(substr($request->course_title, 0, 4)) . rand(100, 999),
                'instructor_name' => $request->instructor_name ?? 'TBA', // Fixed here
                'credits' => $request->credits ?? 3,
                'duration_weeks' => $request->duration_weeks ?? 16,
                'is_active' => $request->is_active ?? false,
            ]
        );

        $enrollment->update([
            'student_id'  => $student->id,
            'course_id'   => $course->id,
            'enrolled_at' => $request->enrolled_at ?? now(),
            'status'      => $request->status,
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
