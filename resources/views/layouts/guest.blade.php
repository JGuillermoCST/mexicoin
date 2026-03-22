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
    
    <body class="w-full">
        @include('structure.header')
        @include('comps.store.cartsidebar')

        <!-- Fondo oscurecido cuando el carrito está abierto -->
        <div id="cartOverlay" class="fixed inset-0 bg-black/30 z-40 hidden"></div>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @include('structure.footer')
        
        
        @livewireScripts
        @include('structure.scripts')

        <!-- Include pushed scripts -->
        @stack('scripts')
    </body>
</html>
