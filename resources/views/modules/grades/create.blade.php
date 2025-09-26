<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: #3E0703; leading-tight">
            Create Grades
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <h1 class="text-2xl" style="color: #3E0703;"><strong>Add New Grade</strong></h1>
                <p>You can add new grade here.</p>
                <hr class="mt-6 mb-6">

                @if(session('success'))
                    <div class="border-green-600" style="color: green">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                    <br>
                @endif

                <form action="{{ route('grades.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="student_id">Student: </label>
                        <select name="student_id" id="student_id" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="0">-- Select student --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="subject_id">Subject: </label>
                        <select name="subject_id" id="subject_id" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="0">-- Select subject --</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="grade">Grade : </label>
                        <input id="grade" name="grade" type="number" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Grade percentage here..">
                    </div>
                    <hr class="mt-6 mb-6">
                    <button type="reset" class="border shadow-md rounded-lg text-white"
                        style="background-color: #3E0703; padding: 8px;">
                        Reset
                    </button>
                    <button type="submit" class="border shadow-md rounded-lg text-white"
                        style="background-color: #3E0703; padding: 8px;">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
