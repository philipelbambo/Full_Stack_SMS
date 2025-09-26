<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Complaints
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('student-complaints.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Add Complaint</a>

                @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table-auto w-full mt-6 border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Student Name</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $complaint)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $complaint->id }}</td>
                                <td class="px-4 py-2">{{ $complaint->student_name }}</td>
                                <td class="px-4 py-2">{{ $complaint->title }}</td>
                                <td class="px-4 py-2">{{ $complaint->description }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('student-complaints.edit', $complaint) }}" class="text-blue-600">Edit</a>
                                    <form action="{{ route('student-complaints.destroy', $complaint) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this complaint?')" class="text-red-600 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $complaints->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
