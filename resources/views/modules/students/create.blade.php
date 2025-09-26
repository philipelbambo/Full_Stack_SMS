<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: #3E0703; leading-tight">
            Create Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <h1 class="text-2xl" style="color: #3E0703;"><strong>Create New Student</strong></h1>
                <p>You can create new student here.</p>
                <hr class="mt-6 mb-6">

                @if(session('success'))
                    <div class="border-green-600" style="color: green">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                    <br>
                @endif

                <form action="{{ route('students.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="name">Name : </label>
                        <input id="name" name="name" type="text" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Student Name here..">
                    </div>
                    <div class="mt-3">
                        <label for="email">Email : </label>
                        <input id="email" name="email" type="email" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Student Email here..">
                    </div>
                    <div class="mt-3">
                        <label for="gender">Gender : </label>
                        <input id="gender" name="gender" type="text" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Student Gender here..">
                    </div>
                    <div class="mt-3">
                        <label for="dob">DOB : </label>
                        <input id="dob" name="dob" type="date" oninput="get_age()" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Student DOB here..">
                    </div>
                    <div class="mt-3">
                        <label for="age">Age : </label>
                        <input readonly id="age" name="age" type="number" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Student Age here..">
                    </div>
                    <div class="mt-3">
                        <label for="department_id">Department: </label>
                        <select name="department_id" id="department_id" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="0">-- Select department --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
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
    <script>
        function get_age() {
            const currentDate = new Date();
            const dob = document.getElementById('dob').value;
            const ageField = document.getElementById('age');
            const birth = new Date(dob);

            let age = currentDate.getFullYear() - birth.getFullYear();

            ageField.value = age;
        }
    </script>
</x-app-layout>
