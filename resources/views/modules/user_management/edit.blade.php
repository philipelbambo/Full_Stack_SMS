@extends('layouts.module-app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Edit User</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user_management.update', $user_management->id) }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name', $user_management->name) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" value="{{ old('email', $user_management->email) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Password <small class="text-gray-500">(Leave blank to keep current password)</small></label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Role</label>
            <input type="text" name="role" class="w-full border px-3 py-2 rounded" value="{{ old('role', $user_management->role) }}">
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="status" class="form-checkbox" {{ $user_management->status ? 'checked' : '' }}>
                <span class="ml-2">Active</span>
            </label>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update User</button>
    </form>
@endsection
