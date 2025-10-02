<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#264653] leading-tight">
            Trash Bin
        </h2>
    </x-slot>

    <div class="py-10 bg-[#faf9f6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">

                <!-- Header Accent -->
                <div class="bg-[#41b6e4] px-6 py-4">
                    <h3 class="text-lg font-semibold text-white">Archived / Deleted Records</h3>
                </div>

                <div class="overflow-x-auto">
                    @if($trashes->isEmpty())
                        <div class="px-6 py-12 text-center">
                            <div class="inline-block p-4 bg-gray-50 rounded-full mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                            <p class="text-gray-500 italic text-lg">No items in trash.</p>
                        </div>
                    @else
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Model</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Reason</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#264653] uppercase tracking-wider">Deleted At</th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-[#264653] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($trashes as $trash)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trash->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $trash->title ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trash->model_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ $trash->reason ?? '—' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ $trash->deleted_at ? $trash->deleted_at->format('M d, Y h:i A') : '—' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        <!-- Restore Button -->
                                        <form action="{{ route('trash.restore', $trash->id) }}" method="POST" class="inline-block mr-2">
                                            @csrf
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 bg-[#E9C46A] text-[#264653] font-medium rounded-md hover:bg-[#d8b45a] transition-colors duration-200 shadow-sm hover:shadow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.679 0V3a1 1 0 112 0v6.5a3.5 3.5 0 11-7 0V3a1 1 0 012 0v2.101a5.002 5.002 0 00-10 0V3a1 1 0 011-1H4zm3 12a1 1 0 100-2 1 1 0 000 2zm4 0a1 1 0 100-2 1 1 0 000 2zm4 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                                Restore
                                            </button>
                                        </form>

                                        <!-- Permanent Delete -->
                                        <form action="{{ route('trash.destroy', $trash->id) }}" method="POST" class="inline-block"
                                              onsubmit="return confirmPermanentDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 transition-colors duration-200 shadow-sm hover:shadow">
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
        function confirmPermanentDelete(event) {
            if (!confirm('⚠️ This will permanently delete the record. Are you sure?')) {
                event.preventDefault();
            }
            return true;
        }
    </script>
</x-app-layout>