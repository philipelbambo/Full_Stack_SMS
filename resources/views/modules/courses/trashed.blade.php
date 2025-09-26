<x-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Trashed Courses</h1>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('courses.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Back to Courses</a>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Title</th>
                        <th class="border border-gray-300 p-2">Code</th>
                        <th class="border border-gray-300 p-2">Instructor</th>
                        <th class="border border-gray-300 p-2">Deleted At</th>
                        <th class="border border-gray-300 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $course->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $course->title }}</td>
                            <td class="border border-gray-300 p-2">{{ $course->code }}</td>
                            <td class="border border-gray-300 p-2">{{ $course->instructor->name ?? 'N/A' }}</td>
                            <td class="border border-gray-300 p-2">{{ $course->deleted_at }}</td>
                            <td class="border border-gray-300 p-2">
                                <form action="{{ route('courses.restore', $course->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-500" onclick="return confirm('Restore this course?')">Restore</button>
                                </form>
                                |
                                <form action="{{ route('courses.forceDelete', $course->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('Permanently delete this course?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-4 text-gray-500">No trashed courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
