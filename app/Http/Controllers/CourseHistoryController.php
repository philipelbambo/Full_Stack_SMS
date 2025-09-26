<?php

namespace App\Http\Controllers;

use App\Models\CourseHistory;
use Illuminate\Http\Request;

class CourseHistoryController extends Controller
{
    public function index()
    {
        $histories = CourseHistory::latest()->paginate(10);
        return view('modules.course_histories.index', compact('histories'));
    }

    public function create()
    {
        return view('modules.course_histories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'grade' => 'nullable|string|max:10',
            'completion_date' => 'nullable|date',
        ]);

        CourseHistory::create($request->all());

        return redirect()->route('course_histories.index')->with('success', 'Course history added successfully.');
    }

    public function edit(CourseHistory $courseHistory)
    {
        return view('modules.course_histories.edit', compact('courseHistory'));
    }

    public function update(Request $request, CourseHistory $courseHistory)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'grade' => 'nullable|string|max:10',
            'completion_date' => 'nullable|date',
        ]);

        $courseHistory->update($request->all());

        return redirect()->route('course_histories.index')->with('success', 'Course history updated successfully.');
    }

    public function destroy(CourseHistory $courseHistory)
    {
        $courseHistory->delete();
        return redirect()->route('course_histories.index')->with('success', 'Course history deleted successfully.');
    }
}
