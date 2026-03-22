<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('comps.general.head')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        @include('structure.header')
        @include('comps.store.cartsidebar')

         <!-- Fondo oscurecido cuando el carrito está abierto -->
        <div id="cartOverlay" class="fixed inset-0 bg-black/30 z-40 hidden"></div>

        <div class="bg-gray-100">
            {{-- @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @include('structure.footer')

        @stack('modals')

        @livewireScripts
        @include('structure.scripts')
        @stack('scripts')
    </body>
</html>
