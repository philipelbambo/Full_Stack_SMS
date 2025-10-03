@extends('layouts.module-app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">User Details</h2>

    <div class="bg-white shadow rounded p-6 space-y-4">
        <p><strong>Name:</strong> {{ $user_management->name }}</p>
        <p><strong>Email:</strong> {{ $user_management->email }}</p>
        <p><strong>Role:</strong> {{ $user_management->role }}</p>
        <p><strong>Status:</strong> {{ $user_management->status ? 'Active' : 'Inactive' }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('user_management.edit', $user_management->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('user_management.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
    </div>
@endsection
