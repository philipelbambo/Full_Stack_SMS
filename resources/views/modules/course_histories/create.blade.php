<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-4">
                <a href="{{ route('course_histories.index') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Course Histories
                </a>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Add New Course History</h2>
                <p class="text-sm text-gray-600 mt-1">Record a new student course completion</p>
            </div>
            <div class="w-32"></div> <!-- Spacer for centering -->
        </div>
    </x-slot>

    <div class="py-8 min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-12">
            <!-- Main Form Container -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
                <!-- Form Header -->
                <div class="px-8 py-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl text-blue-100 font-bold">Course History Form</h3>
                            </div>
                        </div>
                        <div class="hidden sm:flex items-center space-x-2 text-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">Step 1 of 1</span>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="px-8 py-8">
                    <form action="{{ route('course_histories.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <!-- Form Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Student Name Field -->
                                <div class="group">
                                    <label for="student_name" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Student Name
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               id="student_name"
                                               name="student_name" 
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300" 
                                               placeholder="Enter student's full name"
                                               required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Course Name Field -->
                                <div class="group">
                                    <label for="course_name" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        Course Name
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               id="course_name"
                                               name="course_name" 
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300" 
                                               placeholder="e.g., Introduction to Programming"
                                               required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <!-- Grade Field -->
                                <div class="group">
                                    <label for="grade" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                        <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                        </svg>
                                        Grade
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               id="grade"
                                               name="grade" 
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300" 
                                               placeholder="e.g., A+, 95, Pass">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Completion Date Field -->
                                <div class="group">
                                    <label for="completion_date" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Completion Date
                                    </label>
                                    <div class="relative">
                                        <input type="date" 
                                               id="completion_date"
                                               name="completion_date" 
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Info Section -->
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-blue-800 mb-2">Quick Tips</h4>
                                    <ul class="text-sm text-blue-700 space-y-1">
                                        <li>• <strong>Student Name:</strong> Enter the full name as it appears in records</li>
                                        <li>• <strong>Course Name:</strong> Use the official course title or common abbreviation</li>
                                        <li>• <strong>Grade:</strong> Can be letter grade (A, B+), percentage (85%), or status (Pass/Fail)</li>
                                        <li>• <strong>Date:</strong> Select the actual completion or graduation date</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 focus:ring-4 focus:ring-green-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Save Course History
                            </button>
                            
                            <a href="{{ route('course_histories.index') }}" 
                               class="flex-1 sm:flex-none inline-flex items-center justify-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold rounded-xl border-2 border-gray-200 hover:border-gray-300 transition-all duration-200 focus:ring-4 focus:ring-gray-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-8 bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Need Help?</h3>
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-600">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                        <div>
                            <p class="font-medium text-gray-800">Required Fields</p>
                            <p>Student Name and Course Name are mandatory fields</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <div>
                            <p class="font-medium text-gray-800">Grade Format</p>
                            <p>Accept any format: A+, 95%, Pass, Distinction, etc.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                        <div>
                            <p class="font-medium text-gray-800">Auto Save</p>
                            <p>Form data is automatically validated before saving</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>