<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        return view('modules.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('modules.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'instructor_name' => 'required|string|max:255',
            'credits' => 'nullable|integer',
            'duration_weeks' => 'nullable|integer',
        ]);

        Course::create([
            'title' => $request->title,
            'code' => $request->code,
            'instructor_name' => $request->instructor_name,
            'credits' => $request->credits,
            'duration_weeks' => $request->duration_weeks,
            'is_active' => false,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('modules.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'instructor_name' => 'required|string|max:255',
            'credits' => 'nullable|integer',
            'duration_weeks' => 'nullable|integer',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
