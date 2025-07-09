<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        @include('partials.head')
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen h-full bg-light dark:bg-dark">
        <!-- Navegación -->
        <div>
            @include('layouts.navigation')
        </div>

        <!-- Page Heading -->
        @isset($header)
            <header class="shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Pie de página -->
        <x-footer />
        
        <!-- Livewire Scripts -->
        @livewireScripts
    </body>
</html>
