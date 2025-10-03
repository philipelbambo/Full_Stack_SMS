@extends('layouts.module-app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Add New User</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user_management.store') }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Password</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Role</label>
            <input type="text" name="role" class="w-full border px-3 py-2 rounded" value="{{ old('role') }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
    </form>
@endsection
