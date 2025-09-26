<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Course Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar / Header -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Course Management System</h1>
            <!-- optional links -->
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-10 p-4 shadow-inner">
        <div class="text-center text-gray-600">
            &copy; {{ date('Y') }} Your School Name
        </div>
    </footer>

</body>
</html>
