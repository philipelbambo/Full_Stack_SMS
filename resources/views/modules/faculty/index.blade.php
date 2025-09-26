<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: #3E0703; leading-tight">
            List of Faculty
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <a href="{{ route('faculty.form.store') }}" class="p-2 rounded-lg border justify-end"
                    style="background-color: #3E0703; color: #fff">
                    + Add Faculty
                </a>
                <hr class="mt-6 mb-6">

                <table class="table table-bordered p-2 w-full rounded-lg border">
                    <thead class="bg-gray rounded-lg">
                        <th class="bg-gray-200">#</th>
                        <th class="bg-gray-200 text-start">Name</th>
                        <th class="bg-gray-200 text-start">Department</th>
                        <th class="bg-gray-200">Actions</th>
                    </thead>
                    <tbody>
                        @forelse ($faculties as $index => $faculty)
                            <tr class="border">
                                <td class="p-2 border text-center">{{ $index + 1 }}.</td>
                                <td class="p-2 border">{{ $faculty->name }}</td>
                                <td class="p-2 border">{{ $faculty->department->name }}</td>
                                <td class="p-2 border text-center flex gap-2 justify-center">
                                    <button class="p-1 border rounded-lg" 
                                            style="background-color: #3E0703; color: #fff; padding: 5px 10px">
                                        Edit
                                    </button>
                                    <button class="p-1 border rounded-lg" 
                                            style="background-color: #3E0703; color: #fff; padding: 5px 10px">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr class="border">
                                <td colspan="4" class="p-2 border text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
