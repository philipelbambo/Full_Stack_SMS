<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Complaint
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- ✅ Extend width if needed -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('student-complaints.update', $studentComplaint) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="student_name" class="block text-gray-700">Student Name</label>
                        <input type="text" name="student_name" id="student_name" 
                               value="{{ $studentComplaint->student_name }}" 
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="title" 
                               value="{{ $studentComplaint->title }}" 
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" 
                                  class="w-full border rounded px-3 py-2" rows="4" required>{{ $studentComplaint->description }}</textarea>
                    </div>

                    <!-- ✅ Buttons side by side -->
                    <div class="flex space-x-3">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            Update
                        </button>

                        <a href="{{ route('student-complaints.index') }}" 
                           class="bg-gray-500 text-white px-4 py-2 rounded">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
