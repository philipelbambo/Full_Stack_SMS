<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: #3E0703; leading-tight">
            Create Subjects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <h1 class="text-2xl" style="color: #3E0703;"><strong>Create New Subject</strong></h1>
                <p style="color: #3E0703;">You can create new subject here.</p>
                <hr class="mt-6 mb-6" style="border-color: #3E0703;">

                @if(session('success'))
                    <div class="border-green-600" style="color: #3E0703;">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                    <br>
                @endif

                <form action="{{ route('subjects.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="code" style="color: #3E0703;">Code : </label>
                        <input id="code" name="code" type="text" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Subject Code here..">
                    </div>
                    <div class="mt-3">
                        <label for="title" style="color: #3E0703;">Title : </label>
                        <input id="title" name="title" type="text" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Subject Title here..">
                    </div>
                    <div class="mt-3">
                        <label for="description" style="color: #3E0703;">Description : </label>
                        <textarea id="description" name="description" rows="3" type="text" class="mt-3 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Subject Description here.."></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="department_id" style="color: #3E0703;">Department: </label>
                        <select name="department_id" id="department_id" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="0">-- Select department --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="lab_unit" style="color: #3E0703;">Laboratory Unit : </label>
                        <input id="lab_unit" name="lab_unit" type="number" oninput="total_unit()" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Laboratory Unit here..">
                    </div>
                    <div class="mt-3">
                        <label for="lec_unit" style="color: #3E0703;">Lecture Unit : </label>
                        <input id="lec_unit" name="lec_unit" type="number" oninput="total_unit()" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Lecture Unit here..">
                    </div>
                    <div class="mt-3">
                        <label for="total_units" style="color: #3E0703;">Total Unit : </label>
                        <input readonly id="total_units" name="total_units" type="number" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Total Unit here..">
                    </div>
                    <hr class="mt-6 mb-6" style="border-color: #3E0703;">
                    <button type="reset" class="border shadow-md rounded-lg text-white"
                        style="background-color: #3E0703; padding: 8px;"
                        >Reset</button>
                    <button type="submit" class="border shadow-md rounded-lg text-white"
                        style="background-color: #3E0703; padding: 8px;"
                        >Create</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function total_unit() {
            const lab = document.getElementById("lab_unit").value;
            const lec = document.getElementById("lec_unit").value;
            const total = document.getElementById("total_units");

            total.value = Number(lab) + Number(lec);
        }
    </script>
</x-app-layout>
