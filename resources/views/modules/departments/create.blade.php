<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: #3E0703; leading-tight">
            Add Departments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-none sm:rounded-lg border" style="padding: 50px">
                <h1 class="text-2xl" style="color: #3E0703;"><strong>Add New Department</strong></h1>
                <p>You can add new department here.</p>
                <hr class="mt-6 mb-6">

                @if(session('success'))
                    <div class="border-green-600" style="color: green">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                    <br>
                @endif

                <form action="{{ route('departments.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="name">Name : </label>
                        <input id="name" name="name" type="text" class="mt-2 border-gray-300 rounded-lg shadow-sm w-full"
                            placeholder="Department Name here..">
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
