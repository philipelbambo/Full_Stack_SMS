<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Grades
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <a href="{{ route('grades.form.store') }}" class="text-dark p-2 rounded-lg border justify-end" style="background-color: #2563eb; color: #fff">
                    + Create Grade
                </a>
                <hr class="mt-6 mb-6">

                <table class="table table-bordered p-2 w-full rounded-lg border">
                    <thead class="bg-gray rounded-lg">
                        <th class="bg-gray-200">#</th>
                        <th class="bg-gray-200 text-start">Student</th>
                        <th class="bg-gray-200 text-start">Subject</th>
                        <th class="bg-gray-200">Grade</th>
                        <th class="bg-gray-200">Actions</th>
                    </thead>
                    <tbody>
                        @forelse ($grades as $index => $grade)
                            <tr class="border">
                                <td class="p-2 border text-center">{{ $index + 1 }}.</td>
                                <td class="p-2 border">{{ $grade->student->name }}</td>
                                <td class="p-2 border">{{ $grade->subject->subject_title }}</td>
                                <td class="p-2 border text-center">{{ $grade->grade }}</td>
                                <td class="p-2 border text-center">
                                    <button class="p-1 border rounded-lg" style="background-color: orange; color: #fff; padding: 5px; padding-right: 10px; padding-left: 10px">Edit</button>
                                    <button class="p-1 border rounded-lg" style="background-color: red; color: #fff; padding: 5px; padding-right: 10px; padding-left: 10px">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr class="border">
                                <td colspan="5" class="p-2 border text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
