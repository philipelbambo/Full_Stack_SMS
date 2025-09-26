<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Assigned Subjects</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">

                <a href="{{ route('assigned-subjects.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Add Assigned Subject</a>

                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif

                <table class="w-full table-auto border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Faculty</th>
                            <th class="border px-4 py-2">Subject</th>
                            <th class="border px-4 py-2">Course</th>
                            <th class="border px-4 py-2">Semester</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignedSubjects as $subject)
                        <tr>
                            <td class="border px-4 py-2">{{ $subject->id }}</td>
                            <td class="border px-4 py-2">{{ $subject->faculty_name }}</td>
                            <td class="border px-4 py-2">{{ $subject->subject_name }}</td>
                            <td class="border px-4 py-2">{{ $subject->course }}</td>
                            <td class="border px-4 py-2">{{ $subject->semester }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('assigned-subjects.edit', $subject->id) }}" class="text-blue-500 mr-2">Edit</a>
                                <form action="{{ route('assigned-subjects.destroy', $subject->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
