@extends('layouts.module-app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">User Management</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <a href="{{ route('user_management.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add User</a>

        <table class="w-full table-auto mt-4 border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Role</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="px-4 py-2 border">{{ $user->name }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->role }}</td>
                        <td class="px-4 py-2 border">{{ $user->status ? 'Active' : 'Inactive' }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('user_management.edit', $user->id) }}" class="text-blue-500">Edit</a> |
                            <form action="{{ route('user_management.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
