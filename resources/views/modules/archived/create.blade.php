<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Add Archived Record</h2>
    </x-slot>

    <div class="p-4 sm:p-6 lg:p-8 max-w-5xl mx-auto w-full">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8">
            <form action="{{ route('archived.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md"
                        placeholder="Enter record title">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md resize-none"
                        placeholder="Optional description..."></textarea>
                </div>

                <!-- Archived By -->
                <div>
                    <label for="archived_by" class="block text-sm font-semibold text-gray-700 mb-2">Archived By</label>
                    <input
                        type="text"
                        id="archived_by"
                        name="archived_by"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all duration-200 bg-white shadow-sm hover:shadow-md"
                        placeholder="Your name or department">
                </div>

                <!-- Action Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row sm:justify-end gap-3">
                    <!-- Cancel Button (Amber) -->
                    <a href="{{ route('archived.index') }}"
                       class="px-6 py-3 text-amber-700 font-medium bg-amber-100 hover:bg-amber-200 rounded-xl shadow-sm hover:shadow transition-all duration-200 text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </a>

                    <!-- Save Button (Indigo) -->
                    <button
                        type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Save Archived Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>