<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Add Enrollment</h2>
    </x-slot>

    <div class="w-full px-4 sm:px-6 lg:px-8 mt-6 max-w-2xl mx-auto">
        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 sm:p-8">

            <!-- Error Alert -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 text-red-700 border border-red-200 rounded-lg">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('enrollments.store') }}" method="POST">
                @csrf

                <!-- Student -->
                <div class="mb-5">
                    <label for="student_name" class="block text-sm font-semibold text-gray-700 mb-2">Student</label>
                    <input
                        type="text"
                        id="student_name"
                        name="student_name"
                        value="{{ old('student_name') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md"
                        placeholder="Type student name">
                </div>

                <!-- Course -->
                <div class="mb-5">
                    <label for="course_title" class="block text-sm font-semibold text-gray-700 mb-2">Course</label>
                    <input
                        type="text"
                        id="course_title"
                        name="course_title"
                        value="{{ old('course_title') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md"
                        placeholder="Type course title">
                </div>

                <!-- Enrolled At -->
                <div class="mb-5">
                    <label for="enrolled_at" class="block text-sm font-semibold text-gray-700 mb-2">Enrolled At</label>
                    <input
                        type="date"
                        id="enrolled_at"
                        name="enrolled_at"
                        value="{{ old('enrolled_at') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md">
                        <option value="">-- Select status --</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="dropped" {{ old('status') == 'dropped' ? 'selected' : '' }}>Dropped</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-2">
                    <a href="{{ route('enrollments.index') }}"
                       class="px-5 py-2.5 text-gray-700 font-medium bg-white border border-gray-300 hover:bg-gray-50 rounded-lg shadow-sm hover:shadow transition-all duration-200 text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Save Enrollment
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>