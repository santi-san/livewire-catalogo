<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- FAwesome -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        @stack('css')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- Sweet Alert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-900 dark:text-gray-300 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="dark:bg-gray-900">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        @stack('js')
        <script>
            Livewire.on('alert', function(message){
                Swal.fire(
                    'Good job!',
                    message,
                    'success'
                )
            })
        </script>
    </body>
</html>
