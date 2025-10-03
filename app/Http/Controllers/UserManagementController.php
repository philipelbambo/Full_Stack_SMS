<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('modules.user_management.index', compact('users'));
    }

    public function create()
    {
        return view('modules.user_management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 1,
        ]);

        return redirect()->route('user_management.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user_management)
    {
        return view('modules.user_management.edit', compact('user_management'));
    }

    public function update(Request $request, User $user_management)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_management->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string',
        ]);

        $user_management->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user_management->password,
            'role' => $request->role,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('user_management.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user_management)
    {
        $user_management->delete();
        return redirect()->route('user_management.index')->with('success', 'User deleted successfully.');
    }

    public function show(User $user_management)
    {
        return view('modules.user_management.show', compact('user_management'));
    }
}
