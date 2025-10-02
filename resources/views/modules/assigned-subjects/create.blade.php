<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#264653] leading-tight">
            Add Assigned Subject
        </h2>
    </x-slot>

    <div class="py-10 bg-[#faf9f6]">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

                <!-- Header Accent -->
                <div class="bg-[#3bb6e7] px-6 py-3">
                    <h3 class="text-lg font-semibold text-white">New Assignment</h3>
                </div>

                <div class="p-6">
                    <form action="{{ route('assigned-subjects.store') }}" method="POST">
                        @csrf

                        <!-- Faculty Name -->
                        <div class="mb-5">
                            <label for="faculty_name" class="block text-sm font-medium text-[#264653] mb-2">
                                Faculty Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="faculty_name"
                                name="faculty_name"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E9C46A] focus:border-[#264653] outline-none transition duration-200 bg-white"
                                placeholder="e.g. Dr. Jane Smith"
                            >
                        </div>

                        <!-- Subject Name -->
                        <div class="mb-5">
                            <label for="subject_name" class="block text-sm font-medium text-[#264653] mb-2">
                                Subject Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="subject_name"
                                name="subject_name"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E9C46A] focus:border-[#264653] outline-none transition duration-200 bg-white"
                                placeholder="e.g. Calculus II"
                            >
                        </div>

                        <!-- Course -->
                        <div class="mb-5">
                            <label for="course" class="block text-sm font-medium text-[#264653] mb-2">
                                Course
                            </label>
                            <input
                                type="text"
                                id="course"
                                name="course"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E9C46A] focus:border-[#264653] outline-none transition duration-200 bg-white"
                                placeholder="e.g. BSc Computer Science"
                            >
                        </div>

                        <!-- Semester -->
                        <div class="mb-6">
                            <label for="semester" class="block text-sm font-medium text-[#264653] mb-2">
                                Semester
                            </label>
                            <input
                                type="text"
                                id="semester"
                                name="semester"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E9C46A] focus:border-[#264653] outline-none transition duration-200 bg-white"
                                placeholder="e.g. Fall 2024"
                            >
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-3">
                            <a href="{{ route('assigned-subjects.index') }}"
                               class="inline-flex items-center justify-center px-4 py-2.5 text-[#264653] font-medium bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                                ← Back to List
                            </a>
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center px-5 py-2.5 bg-[#40b7e6] text-white font-medium rounded-lg hover:bg-[#1d3540] focus:ring-2 focus:ring-[#E9C46A] focus:outline-none transition-colors duration-200 shadow-sm hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Save Assignment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
