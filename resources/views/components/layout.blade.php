<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('components.nav-link')
    @livewireStyles
</head>

<body>
    <div class="page">

        <div class="desktop-response">
            @include('components.nav-top')
            @include('components.nav-sidemenu')
        </div>

        <div class="main-content app-content pt-0 mt-4">
            <div class="container-fluid">
                <div class="flex items-center justify-between flex-wrap gap-2 mb-3">
                    <div class="flex-grow min-w-0">
                        <div class="w-full">
                            @include('layouts.partials.breadcrumbs')
                        </div>
                    </div>
                </div>

                {{-- This is where page content goes --}}
                {{ $slot }}

            </div>
        </div>

        @include('components.nav-footer')
    </div>

    @include('components.nav-footer-link')
</body>
</html>
