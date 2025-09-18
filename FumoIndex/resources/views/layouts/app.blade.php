<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - The Fumo Index</title>
        <link rel="shortcut icon" href="{{ asset('img/FumoIndex.svg') }}" type="image/x-icon">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-background min-h-screen flex flex-col">
        @include('components.header')
        <main class="flex-1">
            @yield('content')
        </main>
        @include('components.footer')
        @stack('scripts')
        @livewireScripts
    </body>
</html>