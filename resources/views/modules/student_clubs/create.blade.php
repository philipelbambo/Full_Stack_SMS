    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('student-clubs.index') }}" 
                    class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Clubs
                    </a>
                    <div class="h-6 w-px bg-gray-300"></div>
                    <div>
                        <h2 class="font-bold text-2xl text-gray-900 leading-tight">Add New Club Membership</h2>
                        <p class="text-sm text-gray-600 mt-1">Create a new student club membership record</p>
                    </div>
                </div>
            </div>
        </x-slot>

        <div class="py-8">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <!-- Progress Indicator -->
                <div class="mb-8">
                    <div class="flex items-center justify-center">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full text-sm font-semibold">
                                    1
                                </div>
                                <span class="ml-2 text-sm font-medium text-blue-600">Club Details</span>
                            </div>
                            <div class="h-px w-16 bg-gray-300"></div>
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-8 h-8 bg-gray-300 text-gray-500 rounded-full text-sm font-semibold">
                                    2
                                </div>
                                <span class="ml-2 text-sm font-medium text-gray-500">Review & Save</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Form Card -->
                <div class="w-full bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6 border-b border-gray-100">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">Student Club Information</h3>
                                <p class="text-sm text-gray-600 mt-1">Please fill out all the required information below</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form action="{{ route('student-clubs.store') }}" method="POST" class="p-8">
                        @csrf
                        
                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h4 class="text-red-800 font-medium">Please fix the following errors:</h4>
                                </div>
                                <ul class="text-red-700 text-sm space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="flex items-center">
                                            <span class="w-1 h-1 bg-red-400 rounded-full mr-2"></span>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Student Information Section -->
                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                    <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Student Information
                                    </h4>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="student_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                                Student Name <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" 
                                                id="student_name" 
                                                name="student_name" 
                                                value="{{ old('student_name') }}"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('student_name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                                placeholder="Enter student's full name"
                                                required>
                                            @error('student_name')
                                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Club Details Section -->
                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                    <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.196-2.196M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.196-2.196M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        Club Details
                                    </h4>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="club_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                                Club Name <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" 
                                                id="club_name" 
                                                name="club_name" 
                                                value="{{ old('club_name') }}"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('club_name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                                placeholder="Enter club name"
                                                required>
                                            @error('club_name')
                                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                                                Role/Position
                                            </label>
                                            <select id="role" 
                                                    name="role" 
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('role') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                                <option value="">Select a role</option>
                                                <option value="President" {{ old('role') == 'President' ? 'selected' : '' }}>President</option>
                                                <option value="Vice President" {{ old('role') == 'Vice President' ? 'selected' : '' }}>Vice President</option>
                                                <option value="Secretary" {{ old('role') == 'Secretary' ? 'selected' : '' }}>Secretary</option>
                                                <option value="Treasurer" {{ old('role') == 'Treasurer' ? 'selected' : '' }}>Treasurer</option>
                                                <option value="Member" {{ old('role') == 'Member' ? 'selected' : '' }}>Member</option>
                                                <option value="Committee Head" {{ old('role') == 'Committee Head' ? 'selected' : '' }}>Committee Head</option>
                                                <option value="Volunteer" {{ old('role') == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                                            </select>
                                            @error('role')
                                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                            <p class="text-gray-500 text-xs mt-1">Select the student's role in the club</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <!-- Membership Duration Section -->
                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                    <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 012 0v4m0 0V3a1 1 0 012 0v4m0 0h4m-6 0h-6m1 5h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Membership Duration
                                    </h4>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                                Start Date
                                            </label>
                                            <input type="date" 
                                                id="start_date" 
                                                name="start_date" 
                                                value="{{ old('start_date') }}"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('start_date') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                            @error('start_date')
                                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                            <p class="text-gray-500 text-xs mt-1">When did the student join this club?</p>
                                        </div>

                                        <div>
                                            <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                                End Date (Optional)
                                            </label>
                                            <input type="date" 
                                                id="end_date" 
                                                name="end_date" 
                                                value="{{ old('end_date') }}"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('end_date') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                            @error('end_date')
                                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                            <p class="text-gray-500 text-xs mt-1">Leave empty if membership is ongoing</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Summary Card -->
                                <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                                    <h4 class="text-lg font-medium text-blue-900 mb-3 flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Quick Tips
                                    </h4>
                                    <ul class="text-blue-800 text-sm space-y-2">
                                        <li class="flex items-start">
                                            <span class="w-1 h-1 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                            Required fields are marked with a red asterisk (*)
                                        </li>
                                        <li class="flex items-start">
                                            <span class="w-1 h-1 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                            End date can be left empty for ongoing memberships
                                        </li>
                                        <li class="flex items-start">
                                            <span class="w-1 h-1 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                            Make sure all information is accurate before saving
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('student-clubs.index') }}" 
                                class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Save Club Membership
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>