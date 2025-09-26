<x-layout>
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4" style="color: #3E0703;">Courses</h1>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('courses.create') }}" class="px-4 py-2 rounded mb-4 inline-block text-white" style="background-color: #3E0703;">Add New Course</a>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr style="background-color: #e0e0e0; color: black;">
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Course Title</th>
                            <th class="border border-gray-300 p-2">Code</th>
                            <th class="border border-gray-300 p-2">Instructor</th>
                            <th class="border border-gray-300 p-2">Credits</th>
                            <th class="border border-gray-300 p-2">Duration</th>
                            <th class="border border-gray-300 p-2">Active</th>
                            <th class="border border-gray-300 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $course->id }}</td>
                                <td class="border border-gray-300 p-2">{{ $course->title }}</td>
                                <td class="border border-gray-300 p-2">{{ $course->code }}</td>
                                <td class="border border-gray-300 p-2">{{ $course->instructor_name }}</td>
                                <td class="border border-gray-300 p-2">{{ $course->credits }}</td>
                                <td class="border border-gray-300 p-2">{{ $course->duration_weeks }}</td>
                                <td class="border border-gray-300 p-2">{{ $course->is_active ? 'Yes' : 'No' }}</td>
                                <td class="border border-gray-300 p-2">
                                    <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-500">Edit</a>
                                    |
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-4 text-gray-500">No courses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
