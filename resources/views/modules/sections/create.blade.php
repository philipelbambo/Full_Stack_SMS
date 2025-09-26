@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4 text-[#3E0703]">Add Section</h1>

    @if ($errors->any())
        <div class="bg-[#3E0703]/10 text-[#3E0703] p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sections.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium text-[#3E0703]">Section Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-[#3E0703]" required>
        </div>

        <div>
            <label for="grade_level" class="block font-medium text-[#3E0703]">Grade Level</label>
            <input type="text" name="grade_level" id="grade_level" value="{{ old('grade_level') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-[#3E0703]" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('sections.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 bg-[#3E0703] text-white rounded hover:bg-[#5a0d08]">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
