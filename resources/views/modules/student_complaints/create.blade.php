<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                    Submit New Complaint
                </h2>
                <p class="text-sm text-gray-600 mt-1">Report your concern or feedback to help us improve</p>
            </div>
            <div class="hidden sm:flex items-center">
                <nav class="text-sm breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a href="{{ route('student-complaints.index') }}" class="text-blue-600 hover:text-blue-800">Complaints</a>
                            <svg class="fill-current w-3 h-3 mx-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="m285.476 272.971-128-128c-4.686-4.686-12.284-4.686-16.97 0l-128 128c-4.686 4.686-4.686 12.284 0 16.97l128 128c4.686 4.686 12.284 4.686 16.97 0l128-128c4.686-4.686 4.686-12.284 0-16.97z"/>
                            </svg>
                        </li>
                        <li>
                            <span class="text-gray-500">New Complaint</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Card -->
            <div class="bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Complaint Details</h3>
                            <p class="text-sm text-gray-600">Please fill out all required fields marked with *</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="px-6 py-8">
                    <form action="{{ route('student-complaints.store') }}" method="POST" id="complaintForm">
                        @csrf

                        <!-- Student Information Section -->
                        <div class="mb-8">
                            <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Student Information
                            </h4>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="lg:col-span-1">
                                    <label for="student_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Student Name <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="student_name" 
                                               id="student_name" 
                                               value="{{ old('student_name') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 @error('student_name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                               placeholder="Enter your full name"
                                               required>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('student_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Additional field for better layout balance -->
                                <div class="lg:col-span-1">
                                    <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                        Student ID <span class="text-gray-400">(Optional)</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="student_id" 
                                               id="student_id" 
                                               value="{{ old('student_id') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400" 
                                               placeholder="Enter your student ID">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V4a2 2 0 112 2m-2 2v2m0 4v2"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Your student identification number</p>
                                </div>
                            </div>
                        </div>

                        <!-- Complaint Details Section -->
                        <div class="mb-8">
                            <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Complaint Details
                            </h4>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="lg:col-span-1">
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                        Complaint Title <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="title" 
                                               id="title" 
                                               value="{{ old('title') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 @error('title') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                               placeholder="Brief summary of your complaint"
                                               required>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">Keep it concise and descriptive</p>
                                </div>

                                <!-- Priority Level moved here for better layout -->
                                <div class="lg:col-span-1">
                                    <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">
                                        Priority Level
                                    </label>
                                    <select name="priority" 
                                            id="priority"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white">
                                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low - General feedback or minor concern</option>
                                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : 'selected' }}>Medium - Moderate issue requiring attention</option>
                                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High - Urgent matter requiring immediate attention</option>
                                    </select>
                                    <p class="mt-1 text-xs text-gray-500">Select the appropriate priority level for your complaint</p>
                                </div>

                                <div class="lg:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                        Detailed Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="description" 
                                              id="description" 
                                              rows="8"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 resize-y @error('description') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                              placeholder="Please provide a detailed description of your complaint, including any relevant context, dates, and circumstances..."
                                              required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <div class="flex justify-between items-center mt-1">
                                        <p class="text-xs text-gray-500">Be as specific as possible to help us address your concern effectively</p>
                                        <span class="text-xs text-gray-400" id="charCount">0 characters</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="bg-gray-50 -mx-6 -mb-8 px-6 py-6 rounded-b-xl">
                            <div class="flex flex-col sm:flex-row sm:justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                                <a href="{{ route('student-complaints.index') }}" 
                                   class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel
                                </a>
                                
                                <button type="submit" 
                                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                        id="submitBtn">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    <span id="submitText">Submit Complaint</span>
                                    <svg class="animate-spin -mr-1 ml-2 h-4 w-4 text-white hidden" id="submitSpinner" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800 mb-2">Need Help?</h3>
                        <div class="text-sm text-blue-700 space-y-1">
                            <p>• Be specific and detailed in your complaint description</p>
                            <p>• Include relevant dates, times, and locations if applicable</p>
                            <p>• Provide any evidence or documentation that supports your complaint</p>
                            <p>• Use professional and respectful language</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter for description
        document.getElementById('description').addEventListener('input', function() {
            const charCount = this.value.length;
            document.getElementById('charCount').textContent = charCount + ' characters';
        });

        // Form submission with loading state
        document.getElementById('complaintForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            
            submitBtn.disabled = true;
            submitText.textContent = 'Submitting...';
            submitSpinner.classList.remove('hidden');
            
            // Re-enable after 3 seconds in case of error
            setTimeout(function() {
                submitBtn.disabled = false;
                submitText.textContent = 'Submit Complaint';
                submitSpinner.classList.add('hidden');
            }, 3000);
        });

        // Auto-resize textarea
        document.getElementById('description').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
</x-app-layout>