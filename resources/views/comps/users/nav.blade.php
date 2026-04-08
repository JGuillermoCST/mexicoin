{{-- ════════════════════════════════════════════════════════════
     MOBILE: Topbar con botón hamburguesa
════════════════════════════════════════════════════════════ --}}
<div class="lg:hidden flex items-center justify-between px-4 py-3 bg-white border-b border-gray-200 sticky top-0 z-30">
    {{-- <img class="h-7 w-auto" src="https://tailwindui.com/img/logos/easywire-logo-cyan-600-mark-gray-900-text.svg" alt="Easywire logo"> --}}
    <button
        onclick="navOpen()"
        class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition"
        aria-label="Abrir menú"
    >
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>
</div>

{{-- ════════════════════════════════════════════════════════════
     MOBILE: Overlay backdrop
════════════════════════════════════════════════════════════ --}}
<div
    id="nav-backdrop"
    onclick="navClose()"
    class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"
></div>

{{-- ════════════════════════════════════════════════════════════
     SIDEBAR — shared desktop (fixed) + mobile (drawer)
════════════════════════════════════════════════════════════ --}}
<div
    id="nav-sidebar"
    class="
        fixed mt-16 inset-y-0 left-0 z-50
        w-64 flex flex-col
        bg-white border-r border-gray-200
        transform -translate-x-full
        transition-transform duration-300 ease-in-out
        lg:translate-x-0 lg:z-auto
    "
>
    <div class="flex flex-col grow pt-5 pb-4 overflow-y-auto">

        {{-- Logo + botón cerrar (solo visible en móvil) --}}
        <div class="flex items-center justify-between shrink-0 px-6 mb-1">
            {{-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/easywire-logo-cyan-600-mark-gray-900-text.svg" alt="Easywire logo"> --}}
            <button
                onclick="navClose()"
                class="lg:hidden p-1.5 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition"
                aria-label="Cerrar menú"
            >
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Navegación principal --}}
        <nav class="mt-5 flex-1 flex flex-col overflow-y-auto" aria-label="Sidebar">
            <div class="px-4 space-y-1">

                {{-- Dashboard --}}
                <a href="{{ route('dashboard') }}"
                   onclick="navClose()"
                   class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                          {{ request()->routeIs('dashboard') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                          transition-all">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('dashboard') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    General
                </a>

                {{-- Membresía Plus --}}
                @if (auth()->user()->subscription?->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnR5RBqlwskPfVY8CNlG6h')
                <a href="{{ route('details-plus') }}"
                   onclick="navClose()"
                   class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                          {{ request()->routeIs('details-plus') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                          transition-all">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('details-plus') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="m21 7.5-9-5.25L3 7.5m18 0v9l-9 5.25M3 7.5v9l9 5.25"/>
                    </svg>
                    Membresía Plus
                </a>
                @endif

                @if (auth()->user()->subscription?->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnRiRBqlwskPfV3gTwIQfS')
                {{-- Membresía Pro --}}
                <a href="{{ route('details-pro') }}"
                   onclick="navClose()"
                   class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                          {{ request()->routeIs('details-pro') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                          transition-all">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('details-pro') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="m21 7.5-9-5.25L3 7.5m18 0v9l-9 5.25M3 7.5v9l9 5.25"/>
                    </svg>
                    Membresía Pro
                </a>
                @endif

                {{-- Links solo para usuarios no-admin --}}
                @if(Auth::user()->type != 'admin')

                    <a href="{{ route('orders') }}"
                       onclick="navClose()"
                       class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                              {{ request()->routeIs('orders') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                              transition-all">
                        <svg class="mr-3 h-5 w-5 {{ request()->routeIs('orders') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Mis pedidos
                    </a>

                    <a href="{{ route('addresses') }}"
                       onclick="navClose()"
                       class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                              {{ request()->routeIs('addresses') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                              transition-all">
                        <svg class="mr-3 h-5 w-5 {{ request()->routeIs('addresses') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125H9.75V15h4.5v4.875H19.5V9.75"/>
                        </svg>
                        Mis direcciones
                    </a>

                @endif

                {{-- Links solo para admin --}}
                @if(Auth::user()->type === 'admin')

                    <a href="{{ route('admin-products') }}"
                       onclick="navClose()"
                       class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                              {{ request()->routeIs('admin-products') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                              transition-all">
                        <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin-products') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6l5.4 5.4V19a2 2 0 01-2 2z"/>
                        </svg>
                        Catálogo de productos
                    </a>

                    <a href="{{ route('admin-promos') }}"
                       onclick="navClose()"
                       class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                              {{ request()->routeIs('admin-promos') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                              transition-all">
                        <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin-promos') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6l5.4 5.4V19a2 2 0 01-2 2z"/>
                        </svg>
                        Promocional
                    </a>

                @endif

                {{-- Cerrar sesión --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full text-left group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all">
                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-red-500" fill="none" stroke-width="1.5" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-7.5A2.25 2.25 0 003.75 5.25v13.5A2.25 2.25 0 006 21h7.5a2.25 2.25 0 002.25-2.25V15M18 12h-9m0 0l3-3m-3 3l3 3"/>
                        </svg>
                        Cerrar sesión
                    </button>
                </form>

            </div>

            {{-- Divider + links secundarios --}}
            <div class="mt-8 border-t border-gray-200 pt-6 px-4 space-y-1">

                <a href="{{ route('profile') }}"
                   onclick="navClose()"
                   class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                          {{ request()->routeIs('profile') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                          transition-all">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('profile') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c-1.543.94-2.31 2.67-1.942 4.316a1.724 1.724 0 00-2.573 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.065 1.724 1.724 0 01-1.942-4.316 1.724 1.724 0 002.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Configuración
                </a>

                <a href="{{ route('faq') }}"
                   onclick="navClose()"
                   class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                          {{ request()->routeIs('faq') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                          transition-all">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('faq') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Centro de ayuda
                </a>

                <a href="{{ route('policies') }}"
                   onclick="navClose()"
                   class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg
                          {{ request()->routeIs('policies') ? 'bg-cyan-50 text-cyan-700' : 'text-gray-700 hover:bg-gray-100 hover:text-cyan-700' }}
                          transition-all">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('policies') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-cyan-600' }}"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Privacidad
                </a>

            </div>
        </nav>
    </div>
</div>

<script>
(function () {
    var sidebar  = document.getElementById('nav-sidebar');
    var backdrop = document.getElementById('nav-backdrop');

    window.navOpen = function () {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        backdrop.classList.remove('opacity-0', 'pointer-events-none');
        backdrop.classList.add('opacity-100');
        document.body.style.overflow = 'hidden';
    };

    window.navClose = function () {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        backdrop.classList.add('opacity-0', 'pointer-events-none');
        backdrop.classList.remove('opacity-100');
        document.body.style.overflow = '';
    };

    /* Cerrar con Escape */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') navClose();
    });
})();
</script>
