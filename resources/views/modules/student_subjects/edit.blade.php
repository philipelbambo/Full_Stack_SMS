    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                        ✏️ Edit Subject
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Update the details for {{ $studentSubject->name }}</p>
                </div>
            </div>
        </x-slot>

        <div class="py-8">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb Navigation -->
                <div class="mb-6">
                    <nav class="flex items-center space-x-2 text-sm text-gray-500">
                        <a href="{{ route('student-subjects.index') }}" class="hover:text-blue-600 transition-colors duration-200">
                            📚 Student Subjects
                        </a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-gray-700 font-medium">Edit Subject</span>
                    </nav>
                </div>

                <!-- Subject Info Card -->
                <div class="bg-gradient-to-r from-amber-50 to-orange-100 border-l-4 border-amber-500 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">{{ substr($studentSubject->code, 0, 2) }}</span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-amber-900">Currently Editing</h3>
                            <p class="text-amber-800">
                                <span class="font-medium">{{ $studentSubject->name }}</span> 
                                <span class="mx-2">•</span> 
                                <span class="bg-amber-200 px-2 py-1 rounded text-xs">{{ $studentSubject->code }}</span>
                                <span class="mx-2">•</span>
                                <span class="text-sm">{{ $studentSubject->credits }} units</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Main Form Card -->
                <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                    <!-- Header Section -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-100 px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">📝</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Subject Information</h3>
                                <p class="text-blue-700 text-sm">Update the details below to modify this subject</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="p-6">
                        <!-- Form -->
                        <form action="{{ route('student-subjects.update', $studentSubject->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <!-- Subject Name Field -->
                            <div class="form-group">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        📚 Subject Name
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="text" 
                                    id="name"
                                    name="name" 
                                    value="{{ old('name', $studentSubject->name) }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                    placeholder="Enter subject name (e.g., Introduction to Computer Science)"
                                    required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Enter the full name of the subject</p>
                            </div>

                            <!-- Subject Code Field -->
                            <div class="form-group">
                                <label for="code" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        🔢 Subject Code
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                        id="code"
                                        name="code" 
                                        value="{{ old('code', $studentSubject->code) }}" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('code') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                        placeholder="Enter subject code (e.g., CS101)"
                                        style="text-transform: uppercase;"
                                        required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <div class="bg-gray-100 px-2 py-1 rounded text-xs text-gray-600">
                                            Original: {{ $studentSubject->code }}
                                        </div>
                                    </div>
                                </div>
                                @error('code')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Unique identifier for the subject (letters and numbers)</p>
                            </div>

                            <!-- Credits Field -->
                            <div class="form-group">
                                <label for="credits" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        ⭐ Credit Units
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                        id="credits"
                                        name="credits" 
                                        value="{{ old('credits', $studentSubject->credits) }}" 
                                        min="0" 
                                        max="10" 
                                        step="0.5"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('credits') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                        placeholder="Enter credit units (e.g., 3)"
                                        required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span class="text-gray-500 text-sm"></span>
                                    </div>
                                </div>
                                @error('credits')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    Number of credit units (currently: {{ $studentSubject->credits }} units)
                                </p>
                            </div>

                            <!-- Change Summary -->
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Current Values
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-sm">
                                    <div class="bg-white p-3 rounded border">
                                        <div class="text-gray-600">Subject Name</div>
                                        <div class="font-medium text-gray-900">{{ $studentSubject->name }}</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border">
                                        <div class="text-gray-600">Subject Code</div>
                                        <div class="font-medium text-gray-900">{{ $studentSubject->code }}</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border">
                                        <div class="text-gray-600">Credits</div>
                                        <div class="font-medium text-gray-900">{{ $studentSubject->credits }} units</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                                <button type="submit" 
                                        class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                    </svg>
                                    Update Subject
                                </button>
                                <a href="{{ route('student-subjects.index') }}" 
                                class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Cancel Changes
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="mt-6 bg-amber-50 border border-amber-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-amber-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-amber-900">Important Notes</h4>
                            <ul class="mt-2 text-sm text-amber-800 space-y-1">
                                <li>• Changes will be saved immediately after clicking "Update Subject"</li>
                                <li>• Make sure the subject code is unique across all subjects</li>
                                <li>• Credit units should reflect the actual course load</li>
                                <li>• All enrolled students will see the updated information</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>