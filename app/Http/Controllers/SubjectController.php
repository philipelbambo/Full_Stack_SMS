<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Subject;
use Exception;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('department')->latest()->get();

        return view('modules.subjects.index', compact('subjects'));
    }

    public function createForm()
    {
        $departments = Department::all();

        return view('modules.subjects.create', compact('departments'));
    }

    public function store(Request $request)
    {
    
        $validated = $request->validate([
            'code' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'lab_unit' => 'required|string',
            'lec_unit' => 'required|string',
            'total_units' => 'required|string',
            'department_id' => 'required|integer|exists:departments,id'
        ]);

        Subject::create([
            'subject_code' => $validated['code'],
            'subject_title' => $validated['title'],
            'subject_description' => $validated['description'],
            'subject_lab_unit' => $validated['lab_unit'],
            'subject_lec_unit' => $validated['lec_unit'],
            'subject_total_unit' => $validated['total_units'],
            'department_id' => $validated['department_id'],
        ]);

        return redirect()->route('subjects.form.store')->with('success', 'Subject added successfully');
    }
}
