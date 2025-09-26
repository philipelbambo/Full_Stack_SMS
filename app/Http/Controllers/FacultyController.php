<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

    public function index()
    {
        $faculties = Faculty::with('department')->latest()->get();

        return view('modules.faculty.index', compact('faculties'));
    }

    public function createForm()
    {
        $departments = Department::all();

        return view('modules.faculty.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'department_id' => 'required|integer|exists:departments,id'
        ]);

        Faculty::create([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        return redirect()->route('faculty.form.store')->with('success', 'Faculty added successfully');
    }
}
