<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Archived Details</h2>
    </x-slot>

    <div class="p-4 sm:p-6 lg:p-8 max-w-4xl mx-auto w-full">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 px-6 py-4 border-b border-indigo-100">
                <h3 class="text-lg font-semibold text-indigo-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Record Overview
                </h3>
            </div>

            <!-- Details Grid -->
            <div class="p-6 sm:p-8 space-y-5">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">ID</span>
                    <span class="mt-1 sm:mt-0 font-mono text-gray-900 bg-indigo-50 px-2.5 py-1 rounded">{{ $archived->id }}</span>
                </div>

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">Title</span>
                    <span class="mt-1 sm:mt-0 text-gray-900 font-medium max-w-prose break-words">{{ $archived->title }}</span>
                </div>

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">Description</span>
                    <span class="mt-1 sm:mt-0 text-gray-700 max-w-prose break-words">
                        {{ $archived->description ?: '—' }}
                    </span>
                </div>

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start border-b border-gray-100 pb-4">
                    <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">Archived By</span>
                    <span class="mt-1 sm:mt-0 text-gray-900">{{ $archived->archived_by }}</span>
                </div>

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start">
                    <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">Created At</span>
                    <span class="mt-1 sm:mt-0 text-gray-700 font-medium">
                        {{ $archived->created_at->format('M d, Y \a\t H:i') }}
                    </span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('archived.index') }}"
                   class="px-5 py-2.5 text-gray-700 hover:text-gray-900 font-medium rounded-lg transition-colors">
                    ← Back to List
                </a>
                <a href="{{ route('archived.edit', $archived) }}"
                   class="px-5 py-2.5 bg-amber-100 hover:bg-amber-200 text-amber-800 font-medium rounded-lg shadow-sm hover:shadow transition-all flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>