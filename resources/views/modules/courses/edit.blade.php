<x-layout>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4" style="color: #3E0703;">Edit Course</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Code</label>
                    <input type="text" name="code" value="{{ old('code', $course->code) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Credits</label>
                    <input type="number" name="credits" value="{{ old('credits', $course->credits) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Duration (weeks)</label>
                    <input type="number" name="duration_weeks" value="{{ old('duration_weeks', $course->duration_weeks) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Instructor</label>
                    <select name="instructor_id" class="w-full border p-2 rounded">
                        <option value="">-- Select Instructor --</option>
                        @foreach ($instructors as $instructor)
                            <option value="{{ $instructor->id }}" {{ old('instructor_id', $course->instructor_id) == $instructor->id ? 'selected' : '' }}>
                                {{ $instructor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" class="form-checkbox" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                        <span class="ml-2">Active</span>
                    </label>
                </div>

                <button type="submit" class="px-4 py-2 rounded text-white" style="background-color: #3E0703;">Update Course</button>
                <a href="{{ route('courses.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </form>
        </div>
    </div>
</x-layout>
