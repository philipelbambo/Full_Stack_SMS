@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4 text-[#3E0703]">Sections</h1>

    <a href="{{ route('sections.create') }}" 
       class="bg-[#3E0703] hover:bg-[#5a0d08] text-white px-4 py-2 rounded mb-4 inline-block">
        + Add Section
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border text-[#3E0703]">ID</th>
                <th class="px-4 py-2 border text-[#3E0703]">Name</th>
                <th class="px-4 py-2 border text-[#3E0703]">Grade Level</th>
                <th class="px-4 py-2 border text-[#3E0703]">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sections as $section)
                <tr>
                    <td class="border px-4 py-2">{{ $section->id }}</td>
                    <td class="border px-4 py-2">{{ $section->name }}</td>
                    <td class="border px-4 py-2">{{ $section->grade_level }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('sections.edit', $section) }}" 
                           class="text-[#3E0703] hover:underline mr-2">Edit</a>

                        <form action="{{ route('sections.destroy', $section) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Are you sure you want to delete this section?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[#3E0703] hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">
                        No sections found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
