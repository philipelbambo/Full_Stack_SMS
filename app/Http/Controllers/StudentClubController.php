<?php

namespace App\Http\Controllers;

use App\Models\StudentClub;
use Illuminate\Http\Request;

class StudentClubController extends Controller
{
    public function index()
    {
        // Get latest clubs with pagination
        $clubs = StudentClub::latest()->paginate(10);
        return view('modules.student_clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('modules.student_clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'club_name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'nullable|boolean',
        ]);

        StudentClub::create([
            'student_name' => $request->student_name,
            'club_name' => $request->club_name,
            'role' => $request->role,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_current' => $request->has('is_current'),
        ]);

        return redirect()->route('student-clubs.index')->with('success', 'Club created successfully!');
    }

    public function edit(StudentClub $studentClub)
    {
        return view('modules.student_clubs.edit', compact('studentClub'));
    }

    public function update(Request $request, StudentClub $studentClub)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'club_name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'nullable|boolean',
        ]);

        $studentClub->update([
            'student_name' => $request->student_name,
            'club_name' => $request->club_name,
            'role' => $request->role,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_current' => $request->has('is_current'),
        ]);

        return redirect()->route('student-clubs.index')->with('success', 'Club updated successfully!');
    }

    public function destroy(StudentClub $studentClub)
    {
        $studentClub->delete();
        return redirect()->route('student-clubs.index')->with('success', 'Club deleted successfully!');
    }
}
