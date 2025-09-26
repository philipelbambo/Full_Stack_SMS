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
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Edit Course History</h2>
                <p class="text-sm text-gray-600 mt-1">Update student course completion record</p>
            </div>
            <div class="w-32"></div> <!-- Spacer for centering -->
        </div>
    </x-slot>

    <div class="py-8 min-h-screen bg-gradient-to-br from-orange-50 via-white to-amber-50">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-12">
            <!-- Main Form Container -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
                <!-- Form Header -->
                <div class="px-8 py-6 bg-gradient-to-r from-orange-600 to-amber-600 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold">Edit Course History</h3>
                            </div>
                        </div>
                        <div class="hidden sm:flex items-center space-x-2 text-orange-100">
                            <div class="flex items-center space-x-2 bg-white/20 px-3 py-2 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a.997.997 0 01-1.414 0l-7-7A1.997 1.997 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="text-sm font-medium">Record #{{ $courseHistory->id }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Current Record Info -->
                <div class="px-8 py-4 bg-amber-50 border-b border-amber-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full flex items-center justify-center">
                                <span class="text-sm font-bold text-white">{{ substr($courseHistory->student_name, 0, 2) }}</span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-amber-800">Currently Editing</p>
                                <p class="text-lg font-bold text-amber-900">{{ $courseHistory->student_name }} - {{ $courseHistory->course_name }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-amber-700">Created</p>
                            <p class="text-sm font-medium text-amber-800">
                                {{ \Carbon\Carbon::parse($courseHistory->created_at)->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="px-8 py-8">
                    <form action="{{ route('course_histories.update', $courseHistory->id) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')
                        
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
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300" 
                                               placeholder="Enter student's full name"
                                               value="{{ old('student_name', $courseHistory->student_name) }}"
                                               required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @if($courseHistory->student_name != old('student_name', $courseHistory->student_name))
                                        <p class="text-xs text-amber-600 mt-1 flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Original: {{ $courseHistory->student_name }}
                                        </p>
                                    @endif
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
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300" 
                                               placeholder="e.g., Introduction to Programming"
                                               value="{{ old('course_name', $courseHistory->course_name) }}"
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
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300" 
                                               placeholder="e.g., A+, 95, Pass"
                                               value="{{ old('grade', $courseHistory->grade) }}">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            @php
                                                $gradeColor = 'text-gray-400';
                                                if(is_numeric($courseHistory->grade)) {
                                                    if($courseHistory->grade >= 90) $gradeColor = 'text-green-500';
                                                    elseif($courseHistory->grade >= 80) $gradeColor = 'text-blue-500';
                                                    elseif($courseHistory->grade >= 70) $gradeColor = 'text-yellow-500';
                                                    else $gradeColor = 'text-red-500';
                                                }
                                            @endphp
                                            <svg class="w-5 h-5 {{ $gradeColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 bg-gray-50 focus:bg-white group-hover:border-gray-300"
                                               value="{{ old('completion_date', $courseHistory->completion_date) }}">
                                    </div>
                                    @if($courseHistory->completion_date)
                                        <p class="text-xs text-gray-600 mt-1 flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($courseHistory->completion_date)->format('F j, Y') }} 
                                            ({{ \Carbon\Carbon::parse($courseHistory->completion_date)->diffForHumans() }})
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Change Summary Section -->
                        <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-orange-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-orange-800 mb-3">Editing Guidelines</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-orange-700">
                                        <div class="space-y-2">
                                            <div class="flex items-start space-x-2">
                                                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                                <span><strong>Student Name:</strong> Update if there were spelling errors or name changes</span>
                                            </div>
                                            <div class="flex items-start space-x-2">
                                                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                                <span><strong>Course Name:</strong> Ensure it matches the official course title</span>
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            <div class="flex items-start space-x-2">
                                                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                                <span><strong>Grade:</strong> Update if there was a grade correction or appeal</span>
                                            </div>
                                            <div class="flex items-start space-x-2">
                                                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                                <span><strong>Date:</strong> Correct completion date if initially entered incorrectly</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-700 hover:to-amber-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 focus:ring-4 focus:ring-orange-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Update Course History
                            </button>
                            
                            <a href="{{ route('course_histories.index') }}" 
                               class="flex-1 sm:flex-none inline-flex items-center justify-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold rounded-xl border-2 border-gray-200 hover:border-gray-300 transition-all duration-200 focus:ring-4 focus:ring-gray-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel Changes
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Record History Section -->
            <div class="mt-8 bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Record Information</h3>
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm">Record ID: {{ $courseHistory->id }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                        <div>
                            <p class="font-medium text-gray-800">Created</p>
                            <p class="text-gray-600">{{ \Carbon\Carbon::parse($courseHistory->created_at)->format('M j, Y \a\t g:i A') }}</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($courseHistory->created_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <div>
                            <p class="font-medium text-gray-800">Last Modified</p>
                            <p class="text-gray-600">{{ \Carbon\Carbon::parse($courseHistory->updated_at)->format('M j, Y \a\t g:i A') }}</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($courseHistory->updated_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                        <div>
                            <p class="font-medium text-gray-800">Status</p>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active Record
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>