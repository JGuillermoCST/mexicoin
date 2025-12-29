<!-- Header Glassmorphism limpio y unificado -->
<header class="backdrop-blur-lg shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-4">

      <!-- Logo con enlace e ícono dorado -->
      <a href="{{ route('main') }}" class="flex items-center space-x-2 text-2xl font-bold text-indio-oscuro hover:text-yellow-500 transition duration-300">
        <!-- Moneda dorada animada -->
        {{-- <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-yellow-500 via-yellow-400 to-amber-300 border-2 border-yellow-600 shadow-[0_0_15px_rgba(255,215,0,0.6)] animate-spin-slow"></div> --}}
        <img src="{{ asset('assets/logo/logo-angel-ts.png') }}" alt="logo" class="w-9 h-9 rounded-full object-cover shadow-[0_0_15px_rgba(255,215,0,0.6)]">
        <span>Mexicoin</span>
      </a>

      <!-- Checkbox oculto para controlar el menú -->
      <input type="checkbox" id="menuToggle" class="hidden peer">

      <!-- hamburguesa -->
      <label for="menuToggle" class="lg:hidden text-indio-oscuro cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </label>
      <nav class="absolute left-0 top-full w-full hidden peer-checked:flex flex-col items-center justify-center bg-white/100 backdrop-blur-2xl py-8 space-y-4 text-sm text-indio-gris font-medium shadow-md transition-all duration-300 ease-in-out lg:static lg:flex lg:flex-row lg:items-center lg:space-y-0 lg:space-x-6 lg:bg-transparent lg:backdrop-blur-0 lg:shadow-none lg:py-0 lg:text-base">
        <a href="{{ route('main') }}" class="hover:text-indio-verde transition">Inicio</a>
        <a href="{{ route('store') }}" class="hover:text-indio-verde transition">Tienda</a>
        <a href="{{ route('dashboard') }}" class="hover:text-indio-verde transition">Cuenta</a>
        <a href="{{ route('collections-gold') }}" class="hover:text-indio-verde transition">Oro</a>
        <a href="{{ route('collections-silver') }}" class="hover:text-indio-verde transition">Plata</a>
        <a href="{{ route('collections-numis') }}" class="hover:text-indio-verde transition">Numismática</a>
        <a href="{{ route('collections-bucks') }}" class="hover:text-indio-verde transition">Billetes</a>
      </nav>

      <!-- Carrito -->
      <button class="relative" id="openCart">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indio-oscuro group-hover:text-indio-verde transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.293 2.293a1 1 0 00.707 1.707h12m-6 4a1 1 0 100-2 1 1 0 000 2zm-6 0a1 1 0 100-2 1 1 0 000 2z" />
        </svg>
        <span class="absolute top-0 right-0 text-xs bg-red-600 text-white rounded-full px-1.5 -mt-1 -mr-2">
          @if (Session::has('cart_count'))
            {{ Session::get('cart_count') }}
          @else
            {{ 0 }}
          @endif
        </span>
      </button>
    </div>
  </div>
</header>
<style>
  @keyframes spin-slow {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  .animate-spin-slow {
    animation: spin-slow 6s linear infinite;
  }
</style>
