<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                    Edit Complaint
                </h2>
                <p class="text-sm text-gray-600 mt-1">Update complaint details and information</p>
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
                        <li class="flex items-center">
                            <span class="text-gray-500">Edit #{{ str_pad($studentComplaint->id, 4, '0', STR_PAD_LEFT) }}</span>
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
                <div class="bg-gradient-to-r from-amber-50 to-orange-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Update Complaint Details</h3>
                            <p class="text-sm text-gray-600">Complaint ID: #{{ str_pad($studentComplaint->id, 4, '0', STR_PAD_LEFT) }} • Created {{ $studentComplaint->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="px-6 py-8">
                    <form action="{{ route('student-complaints.update', $studentComplaint) }}" method="POST" id="editComplaintForm">
                        @csrf
                        @method('PUT')

                        <!-- Student Information Section -->
                        <div class="mb-8">
                            <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                               value="{{ old('student_name', $studentComplaint->student_name) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 placeholder-gray-400 @error('student_name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                               placeholder="Enter student's full name"
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

                                <!-- Status Field (if you have status in your model) -->
                                <div class="lg:col-span-1">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                        Status
                                    </label>
                                    <select name="status" 
                                            id="status"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 bg-white">
                                        <option value="pending" {{ old('status', $studentComplaint->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending Review</option>
                                        <option value="in_progress" {{ old('status', $studentComplaint->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="resolved" {{ old('status', $studentComplaint->status ?? '') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                        <option value="closed" {{ old('status', $studentComplaint->status ?? '') == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                    <p class="mt-1 text-xs text-gray-500">Current complaint status</p>
                                </div>
                            </div>
                        </div>

                        <!-- Complaint Details Section -->
                        <div class="mb-8">
                            <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                               value="{{ old('title', $studentComplaint->title) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 placeholder-gray-400 @error('title') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                               placeholder="Brief summary of the complaint"
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

                                <!-- Priority Level -->
                                <div class="lg:col-span-1">
                                    <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">
                                        Priority Level
                                    </label>
                                    <select name="priority" 
                                            id="priority"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 bg-white">
                                        <option value="low" {{ old('priority', $studentComplaint->priority ?? 'medium') == 'low' ? 'selected' : '' }}>Low - General feedback or minor concern</option>
                                        <option value="medium" {{ old('priority', $studentComplaint->priority ?? 'medium') == 'medium' ? 'selected' : '' }}>Medium - Moderate issue requiring attention</option>
                                        <option value="high" {{ old('priority', $studentComplaint->priority ?? 'medium') == 'high' ? 'selected' : '' }}>High - Urgent matter requiring immediate attention</option>
                                    </select>
                                    <p class="mt-1 text-xs text-gray-500">Adjust priority level as needed</p>
                                </div>

                                <div class="lg:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                        Detailed Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="description" 
                                              id="description" 
                                              rows="8"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 placeholder-gray-400 resize-y @error('description') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                              placeholder="Provide detailed description of the complaint..."
                                              required>{{ old('description', $studentComplaint->description) }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <div class="flex justify-between items-center mt-1">
                                        <p class="text-xs text-gray-500">Update description with any new information or clarifications</p>
                                        <span class="text-xs text-gray-400" id="charCount">{{ strlen($studentComplaint->description) }} characters</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Admin Notes Section (Optional) -->
                        <div class="mb-8 bg-gray-50 rounded-lg p-6">
                            <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Admin Notes <span class="text-gray-500 text-sm font-normal">(Optional)</span>
                            </h4>

                            <div>
                                <textarea name="admin_notes" 
                                          id="admin_notes" 
                                          rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 placeholder-gray-400 resize-y bg-white" 
                                          placeholder="Add internal notes about actions taken, follow-ups needed, or resolution details...">{{ old('admin_notes', $studentComplaint->admin_notes ?? '') }}</textarea>
                                <p class="mt-1 text-xs text-gray-500">Internal notes for tracking progress and actions taken</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="bg-gray-50 -mx-6 -mb-8 px-6 py-6 rounded-b-xl">
                            <div class="flex flex-col sm:flex-row sm:justify-between items-center space-y-3 sm:space-y-0 sm:space-x-3">
                                <div class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Last updated: {{ $studentComplaint->updated_at->format('M j, Y \a\t g:i A') }}
                                </div>
                                
                                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
                                    <a href="{{ route('student-complaints.index') }}" 
                                       class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Cancel Changes
                                    </a>
                                    
                                    <button type="submit" 
                                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                                            id="updateBtn">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        <span id="updateText">Update Complaint</span>
                                        <svg class="animate-spin -mr-1 ml-2 h-4 w-4 text-white hidden" id="updateSpinner" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Complaint History Section (Optional Enhancement) -->
            <div class="mt-8 bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Complaint History
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Complaint Created</p>
                                <p class="text-sm text-gray-600">{{ $studentComplaint->created_at->format('M j, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                        @if($studentComplaint->updated_at != $studentComplaint->created_at)
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Last Updated</p>
                                <p class="text-sm text-gray-600">{{ $studentComplaint->updated_at->format('M j, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                        @endif
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
        document.getElementById('editComplaintForm').addEventListener('submit', function() {
            const updateBtn = document.getElementById('updateBtn');
            const updateText = document.getElementById('updateText');
            const updateSpinner = document.getElementById('updateSpinner');
            
            updateBtn.disabled = true;
            updateText.textContent = 'Updating...';
            updateSpinner.classList.remove('hidden');
            
            // Re-enable after 3 seconds in case of error
            setTimeout(function() {
                updateBtn.disabled = false;
                updateText.textContent = 'Update Complaint';
                updateSpinner.classList.add('hidden');
            }, 3000);
        });

        // Auto-resize textarea
        document.getElementById('description').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Initialize character count
        window.addEventListener('load', function() {
            const description = document.getElementById('description');
            const charCount = description.value.length;
            document.getElementById('charCount').textContent = charCount + ' characters';
        });
    </script>
</x-app-layout>