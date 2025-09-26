<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-[#3E0703]">Edit Enrollment</h2>
    </x-slot>

    <div class="w-full px-6 mt-6">
        <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Student -->
            <div class="mb-4">
                <label class="block text-gray-700">Student</label>
                <select name="student_id" class="w-full border rounded px-3 py-2">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $enrollment->student_id == $student->id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Course -->
            <div class="mb-4">
                <label class="block text-gray-700">Course</label>
                <select name="course_id" class="w-full border rounded px-3 py-2">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Enrolled Date -->
            <div class="mb-4">
                <label class="block text-gray-700">Enrolled At</label>
                <input type="date" name="enrolled_at" value="{{ $enrollment->enrolled_at }}" class="w-full border rounded px-3 py-2">
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="block text-gray-700">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="active" {{ $enrollment->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ $enrollment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="dropped" {{ $enrollment->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex gap-2">
                <button type="submit" class="bg-[#3E0703] text-white px-4 py-2 rounded hover:bg-[#5a0a05]">
                    Update
                </button>

                <a href="{{ route('enrollments.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
