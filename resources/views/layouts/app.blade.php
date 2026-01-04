<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-background font-sans antialiased">
<div class=" min-h-screen">
    <!--include navigation.blade-->
        @include('layouts.navigation')


    <!-- Page Heading -->
    @isset($header)
        <header class=" dark:bg-gray-950 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-4xl font-bold text-white text-center">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
<div
    class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-gray-950 backdrop-blur-sm bg-opacity-60 rounded-full border border-gray-700 m-4">
    @include('layouts.app-nav')
</div>
</body>
</html>
