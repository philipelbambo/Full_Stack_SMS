<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    📚 Student Subjects
                </h2>
                <p class="text-sm text-gray-600 mt-1">Manage your academic subjects and course information</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-100 border-l-4 border-blue-500 rounded-lg p-6 mb-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">📖</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-blue-900">Subject Management</h3>
                        <p class="text-blue-700">Track and organize all your academic subjects in one place</p>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Your Subjects</h3>
                            <p class="text-sm text-gray-600">{{ $subjects->total() }} subjects found</p>
                        </div>
                        <a href="{{ route('student-subjects.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add New Subject
                        </a>
                    </div>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mx-6 mt-4">
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Table Section -->
                <div class="overflow-x-auto">
                    @if($subjects->count() > 0)
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <span class="mr-2">#</span>
                                            ID
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <span class="mr-2">📚</span>
                                            Subject Name
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <span class="mr-2">🔢</span>
                                            Code
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <span class="mr-2">⭐</span>
                                            Credits
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <span class="mr-2">⚙️</span>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($subjects as $studentSubject)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-semibold text-xs">
                                                {{ $studentSubject->id }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $studentSubject->name }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full">
                                            {{ $studentSubject->code }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <span class="text-sm font-medium text-gray-900">{{ $studentSubject->credits }}</span>
                                            <span class="ml-1 text-xs text-gray-500">units</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('student-subjects.edit', $studentSubject->id) }}" 
                                               class="inline-flex items-center px-3 py-1.5 bg-amber-100 hover:bg-amber-200 text-amber-800 text-xs font-medium rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-1">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('student-subjects.destroy', $studentSubject->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        onclick="return confirm('⚠️ Are you sure you want to delete this subject? This action cannot be undone.')" 
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-800 text-xs font-medium rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                                <span class="text-4xl">📚</span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No subjects found</h3>
                            <p class="text-gray-600 mb-6">Get started by adding your first subject to the system.</p>
                            <a href="{{ route('student-subjects.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Add Your First Subject
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Pagination Section -->
                @if($subjects->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Showing {{ $subjects->firstItem() }} to {{ $subjects->lastItem() }} of {{ $subjects->total() }} results
                            </div>
                            <div class="pagination-wrapper">
                                {{ $subjects->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Quick Stats Card -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-4 text-center shadow-sm">
                    <div class="text-2xl font-bold text-blue-600">{{ $subjects->total() }}</div>
                    <div class="text-sm text-gray-600">Total Subjects</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4 text-center shadow-sm">
                    <div class="text-2xl font-bold text-green-600">{{ $subjects->sum('credits') }}</div>
                    <div class="text-sm text-gray-600">Total Credits</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4 text-center shadow-sm">
                    <div class="text-2xl font-bold text-purple-600">{{ number_format($subjects->avg('credits'), 1) }}</div>
                    <div class="text-sm text-gray-600">Avg Credits</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>