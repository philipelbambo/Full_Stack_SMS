<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-[#3E0703]">Enrollments</h2>
    </x-slot>

    <!-- Full-width container -->
    <div class="w-full px-6 mt-6">
        <a href="{{ route('enrollments.create') }}"
           class="mb-4 inline-block bg-[#3E0703] text-white px-4 py-2 rounded hover:bg-[#5a0a05]">
            + New Enrollment
        </a>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table wrapper with horizontal scroll -->
        <div class="bg-white shadow-md rounded overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-[#3E0703] text-white">
                        <th class="px-6 py-3 text-left">Student</th>
                        <th class="px-6 py-3 text-left">Course</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr class="border-t">
                            <!-- Student Name + ID -->
                            <td class="px-6 py-3">
                                {{ $enrollment->student->name }}
                                <span class="text-gray-500 text-sm">(ID: {{ $enrollment->student->id }})</span>
                            </td>

                            <!-- Course Title -->
                            <td class="px-6 py-3">
                                {{ $enrollment->course->title }}
                            </td>

                            <!-- Enrolled Date (formatted) -->
                            <td class="px-6 py-3">
                                {{ \Carbon\Carbon::parse($enrollment->enrolled_at)->format('M d, Y') }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-3">
                                {{ ucfirst($enrollment->status) }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-3 flex gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('enrollments.edit', $enrollment->id) }}"
                                   class="text-blue-600 px-3 py-1 rounded">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this enrollment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#3E0703] px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-3 text-center">No enrollments yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
