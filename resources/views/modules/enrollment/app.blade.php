{{-- resources/views/modules/enrollment/app.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('page-title', 'Enrollment')
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Main content --}}
            @yield('content')
        </div>
    </div>

    <div class="bg-gray-200 text-center py-4 mt-6 rounded-lg shadow">
        <p class="text-sm text-gray-600">© {{ date('Y') }} Enrollment Module</p>
    </div>
</x-app-layout>
