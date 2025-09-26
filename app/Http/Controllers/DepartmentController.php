<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Department $departments)
    {
        return view('modules.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:departments,name'
        ]);

        Department::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('departments.form.store')->with('success', 'Department added successfully');
    }

    public function showInfo($id)
    {
        $department = Department::with('faculty', 'subjects')->findOrFail($id);

        return view('modules.departments.show', compact('department'));
    }
}
