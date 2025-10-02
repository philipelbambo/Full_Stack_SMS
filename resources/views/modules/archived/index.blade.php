    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-bold text-2xl text-gray-800">Archived Records</h2>
        </x-slot>

        <div class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto w-full">
            <!-- Main Card -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">

                <!-- Header Bar - SWAPPED: Button on Left, Title on Right -->
                <div class="bg-gray-100 px-8 py-5 flex justify-between items-center">
                    <a href="{{ route('archived.create') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Archived
                    </a>
                    <h3 class="text-lg font-semibold text-gray-800">Archived Records</h3>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="px-8 py-3 bg-green-50 text-green-700 border-b border-green-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-gray-800">
                        <thead class="bg-white border-b border-gray-200">
                            <tr>
                                <th class="px-8 py-4 font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-8 py-4 font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                                <th class="px-8 py-4 font-semibold text-gray-600 uppercase tracking-wider">Archived By</th>
                                <th class="px-8 py-4 font-semibold text-gray-600 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @if($archiveds->count())
                                @foreach($archiveds as $archived)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-8 py-5">{{ $archived->id }}</td>
                                        <td class="px-8 py-5 font-medium">{{ $archived->title }}</td>
                                        <td class="px-8 py-5">{{ $archived->archived_by }}</td>
                                        <td class="px-8 py-5 text-right space-x-4">
                                            <a href="{{ route('archived.show', $archived) }}"
                                            class="text-gray-600 hover:text-gray-900 font-medium inline-flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View
                                            </a>
                                            <a href="{{ route('archived.edit', $archived) }}"
                                            class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('archived.destroy', $archived) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this archived record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium inline-flex items-center text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="px-8 py-16 text-center text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="font-medium">No archived records found.</p>
                                        <p class="mt-1">Click “Add Archived” to create your first record.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>