@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add Enrollment</h1>

    @if($errors->any())
        <div class="bg-red-100 p-2 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-red-700">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Student</label>
            <select name="student_id" class="border p-2 w-full" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Course</label>
            <select name="course_id" class="border p-2 w-full" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Enrolled At</label>
            <input type="date" name="enrolled_at" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <input type="text" name="status" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Save Enrollment</button>
    </form>
</div>
@endsection
