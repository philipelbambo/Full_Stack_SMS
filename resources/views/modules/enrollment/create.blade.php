<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-[#3E0703]">Add Enrollment</h2>
    </x-slot>

    <div class="w-full px-6 mt-6">
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf

            <!-- Student -->
            <div class="mb-4">
                <label class="block text-gray-700">Student</label>
                <input type="text" name="student_name" class="w-full border rounded px-3 py-2" placeholder="Type student name" required>
            </div>

            <!-- Course -->
            <div class="mb-4">
                <label class="block text-gray-700">Course</label>
                <input type="text" name="course_title" class="w-full border rounded px-3 py-2" placeholder="Type course title" required>
            </div>

            <!-- Enrolled At -->
            <div class="mb-4">
                <label class="block text-gray-700">Enrolled At</label>
                <input type="date" name="enrolled_at" class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="block text-gray-700">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2" required>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>

            <button type="submit" class="bg-[#3E0703] text-white px-4 py-2 rounded hover:bg-[#5a0a05]">
                Save Enrollment
            </button>
        </form>
    </div>
</x-app-layout>
