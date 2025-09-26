<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="color: #FFFFFF;">
            List of Subjects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px; border-color: #e0e0e0;">
                <a href="{{ route('subjects.form.store') }}" class="p-2 rounded-lg border justify-end" style="background-color: #3E0703; color: #FFFFFF; border-color: #3E0703;">
                    + Add Subject
                </a>
                <hr class="mt-6 mb-6" style="border-color: #ffffff;">

                <table class="table table-bordered p-2 w-full rounded-lg border" style="border-color: #ffffff;">
                    <thead class="bg-gray-900 rounded-lg" style="background-color: #e0e0e0; color: #FFFFFF;">
                        <th class="text-center">#</th>
                        <th class="text-start">Code</th>
                        <th class="text-start">Title</th>
                        <th class="text-start">Description</th>
                        <th class="text-center">Department</th>
                        <th class="text-center">Lab Unit</th>
                        <th class="text-center">Lec Unit</th>
                        <th class="text-center">Total Unit</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($subjects as $index => $subject)
                            <tr class="border" style="border-color: #3E0703;">
                                <td class="p-2 text-center border">{{ $index + 1 }}.</td>
                                <td class="p-2 border">{{ $subject->subject_code }}</td>
                                <td class="p-2 border">{{ $subject->subject_title }}</td>
                                <td class="p-2 border">{{ $subject->subject_description }}</td>
                                <td class="p-2 border text-center">{{ $subject->department->name }}</td>
                                <td class="p-2 border text-center">{{ $subject->subject_lab_unit }}</td>
                                <td class="p-2 border text-center">{{ $subject->subject_lec_unit }}</td>
                                <td class="p-2 border text-center">{{ $subject->subject_total_unit }}</td>
                                <td class="p-2 border text-center">
                                    <button class="p-1 border rounded-lg" style="background-color: #3E0703; color: #FFFFFF; padding: 5px 10px;">Edit</button>
                                    <button class="p-1 border rounded-lg" style="background-color: #3E0703; color: #FFFFFF; padding: 5px 10px;">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr class="border" style="border-color: #3E0703;">
                                <td colspan="9" class="p-2 border text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
