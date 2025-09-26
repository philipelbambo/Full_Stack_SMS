<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: #3E0703; leading-tight">
            Department Information
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <strong style="font-size: 20px; color: #3E0703;">{{ $department->name }}</strong>
                <hr class="mt-6 mb-6">

                <div style="display: flex; gap: 20px;">
                    <table class="table table-bordered p-2 w-full rounded-lg border">
                        <thead>
                            <th colspan="2" style="background-color: #3E0703; color: #fff;">Faculty</th>
                        </thead>
                        <thead class="bg-gray rounded-lg">
                            <th class="bg-gray-200">#</th>
                            <th class="bg-gray-200 text-start">Name</th>
                        </thead>
                        <tbody>
                            @forelse ($department->faculty as $fac)
                                <tr class="border">
                                    <td class="p-2 border text-center">{{ $loop->iteration }}.</td>
                                    <td class="p-2 border">{{ $fac->name }}</td>
                                </tr>
                            @empty
                                <tr class="border">
                                    <td colspan="2" class="p-2 border text-center">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <table class="table table-bordered p-2 w-full rounded-lg border">
                        <thead>
                            <th colspan="2" style="background-color: #3E0703; color: #fff;">Subjects</th>
                        </thead>
                        <thead class="bg-gray rounded-lg">
                            <th class="bg-gray-200">#</th>
                            <th class="bg-gray-200 text-start">Name</th>
                        </thead>
                        <tbody>
                            @forelse ($department->subjects as $sub)
                                <tr class="border">
                                    <td class="p-2 border text-center">{{ $loop->iteration }}.</td>
                                    <td class="p-2 border">{{ $sub->subject_title }}</td>
                                </tr>
                            @empty
                                <tr class="border">
                                    <td colspan="2" class="p-2 border text-center">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
