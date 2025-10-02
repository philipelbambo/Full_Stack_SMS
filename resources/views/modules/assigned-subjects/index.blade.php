<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#264653] leading-tight">
            Assigned Subjects
        </h2>
    </x-slot>

    <div class="py-10 bg-[#faf9f6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">

                <!-- Header Bar: Swapped Positions -->
                <div class="bg-[#dee3e6] px-6 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <!-- LEFT: Add Button -->
                        <a href="{{ route('assigned-subjects.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-[#1f92c7] text-[#ffffff] font-medium rounded-lg hover:bg-[#509cff] transition-colors duration-200 shadow-sm hover:shadow-md whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Assigned Subject
                        </a>

                        <!-- RIGHT: Title Text -->
                        <h3 class="mt-3 sm:mt-0 text-lg font-semibold text-gray-500 text-right sm:text-left">
                            Manage Assigned Subjects
                        </h3>
                    </div>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="px-6 py-4">
                        <div class="bg-green-50 text-green-700 px-4 py-3 rounded-lg border border-green-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Table -->
                <div class="overflow-x-auto">
                    @if($assignedSubjects->isEmpty())
                        <div class="px-6 py-12 text-center">
                            <p class="text-gray-500 italic">No assigned subjects found.</p>
                        </div>
                    @else
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Faculty</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Subject</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Course</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Semester</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($assignedSubjects as $subject)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $subject->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $subject->faculty_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $subject->subject_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $subject->course }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $subject->semester }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('assigned-subjects.edit', $subject->id) }}"
                                           class="inline-flex items-center text-[#264653] hover:text-[#E9C46A] transition-colors duration-200 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('assigned-subjects.destroy', $subject->id) }}" method="POST" class="inline"
                                              onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center text-red-600 hover:text-red-800 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="h-6"></div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this assigned subject? This action cannot be undone.')) {
                event.preventDefault();
            }
            return true;
        }
    </script>
</x-app-layout>