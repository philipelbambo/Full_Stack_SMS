    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                        ➕ Add New Subject
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Create a new subject for your academic curriculum</p>
                </div>
            </div>
        </x-slot>

        <div class="py-8">
            <!-- Changed from max-w-4xl to w-full -->
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
                        <span class="text-gray-700 font-medium">Add New Subject</span>
                    </nav>
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
                                <p class="text-blue-700 text-sm">Fill in the details below to add a new subject</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="p-6">
                        <!-- Back Button -->
                        <div class="mb-6">
                            <a href="{{ route('student-subjects.index') }}" 
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Back to Subjects
                            </a>
                        </div>

                        <!-- Form -->
                        <form action="{{ route('student-subjects.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
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
                                    value="{{ old('name') }}" 
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
                                <input type="text" 
                                    id="code"
                                    name="code" 
                                    value="{{ old('code') }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('code') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                    placeholder="Enter subject code (e.g., CS101)"
                                    style="text-transform: uppercase;"
                                    required>
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
                                        value="{{ old('credits') }}" 
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
                                <p class="mt-1 text-xs text-gray-500">Number of credit units (typically 1-6 units)</p>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                                <button type="submit" 
                                        class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Save Subject
                                </button>
                                <a href="{{ route('student-subjects.index') }}" 
                                class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-blue-900">Quick Tips</h4>
                            <ul class="mt-2 text-sm text-blue-800 space-y-1">
                                <li>• Use descriptive names that clearly identify the subject</li>
                                <li>• Subject codes should be unique and follow your institution's format</li>
                                <li>• Credit units typically range from 1-6 units per subject</li>
                                <li>• All fields marked with * are required</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>