<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Обьявления') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=open-sans:400" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/js/jquery-3.6.3.min.js','resources/css/app.css', 'resources/js/app.js','resources/js/main.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                <div class="my-5">
                    <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            @section('breadcrumbs', Breadcrumbs::render())
                            @yield('breadcrumbs')
                            @include('flash::message')
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </body>
</html>
