<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Assigned Subject</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('assigned-subjects.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">Faculty Name</label>
                        <input type="text" name="faculty_name" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Subject Name</label>
                        <input type="text" name="subject_name" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Course</label>
                        <input type="text" name="course" class="w-full border px-3 py-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Semester</label>
                        <input type="text" name="semester" class="w-full border px-3 py-2 rounded">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
