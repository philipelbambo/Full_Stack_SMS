<?php

namespace App\Http\Controllers;

use App\Models\StudentComplaint;
use Illuminate\Http\Request;

class StudentComplaintController extends Controller
{
    public function index()
    {
        $complaints = StudentComplaint::latest()->paginate(10);
        return view('modules.student_complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('modules.student_complaints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        StudentComplaint::create($request->all());

        return redirect()->route('student-complaints.index')
            ->with('success', 'Complaint submitted successfully.');
    }

    public function edit(StudentComplaint $studentComplaint)
    {
        return view('modules.student_complaints.edit', compact('studentComplaint'));
    }

    public function update(Request $request, StudentComplaint $studentComplaint)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $studentComplaint->update($request->all());

        return redirect()->route('student-complaints.index')
            ->with('success', 'Complaint updated successfully.');
    }

    public function destroy(StudentComplaint $studentComplaint)
    {
        $studentComplaint->delete();

        return redirect()->route('student-complaints.index')
            ->with('success', 'Complaint deleted successfully.');
    }
}
