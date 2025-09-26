    @extends('layouts.enrollment.app')

    @section('content')
        <h2 class="text-xl font-semibold mb-4">Enrollment Details</h2>

        <div class="bg-white shadow p-6 rounded space-y-4">
            <p><strong>Student:</strong> {{ $enrollment->student->name }}</p>
            <p><strong>Course:</strong> {{ $enrollment->course->name }}</p>
            <p><strong>Enrollment Date:</strong> {{ $enrollment->enrollment_date }}</p>
            <p><strong>Status:</strong> {{ $enrollment->status }}</p>
        </div>

        <div class="mt-6 space-x-2">
            <a href="{{ route('enrollments.edit', $enrollment) }}" 
            class="bg-blue-600 text-white px-4 py-2 rounded">Edit</a>

            <form action="{{ route('enrollments.destroy', $enrollment) }}" 
                method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this enrollment?')" 
                        class="bg-red-600 text-white px-4 py-2 rounded">
                    Delete
                </button>
            </form>

            <a href="{{ route('enrollments.index') }}" 
            class="bg-gray-500 text-white px-4 py-2 rounded">Back to List</a>
        </div>
    @endsection
