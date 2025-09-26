<x-layout>
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4" style="color: #3E0703;">Add New Course</h1>

            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label>Course Title</label>
                    <input type="text" name="title" class="border p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label>Course Code</label>
                    <input type="text" name="code" class="border p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label>Instructor Name</label>
                    <input type="text" name="instructor_name" class="border p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label>Credits</label>
                    <input type="number" name="credits" class="border p-2 w-full">
                </div>
                <div class="mb-4">
                    <label>Duration (weeks)</label>
                    <input type="number" name="duration_weeks" class="border p-2 w-full">
                </div>
                <button type="submit" class="px-4 py-2 rounded text-white" style="background-color: #3E0703;">Save Course</button>
            </form>
        </div>
    </div>
</x-layout>
