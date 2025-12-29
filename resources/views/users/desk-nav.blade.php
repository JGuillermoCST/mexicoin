<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0 bg-white border-r border-gray-200">
  <!-- Sidebar component -->
  <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto">
    
    <!-- Logo -->
    <div class="flex items-center flex-shrink-0 px-6">
      <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/easywire-logo-cyan-600-mark-gray-900-text.svg" alt="Easywire logo">
    </div>

    <!-- Navigation -->
    <nav class="mt-6 flex-1 flex flex-col overflow-y-auto" aria-label="Sidebar">
      <div class="px-4 space-y-1">

        <!-- Active link -->
        <a href="{{ route('dashboard') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-cyan-50 text-cyan-700 hover:bg-cyan-100 transition-all">
          <svg class="mr-3 h-5 w-5 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          General
        </a>

        @if ($user->type != 'admin')
          <a href="{{ route('purchase-history') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Historial de compras
          </a>

          <a href="{{ route('usr-comsoon') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m21 7.5-9-5.25L3 7.5m18 0v9l-9 5.25M3 7.5v9l9 5.25" />
            </svg>
            Mis pedidos
          </a>

          <a href="{{ route('usr-comsoon') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125H9.75V15h4.5v4.875H19.5V9.75" />
            </svg>
            Mis direcciones
          </a>
        @endif

        @if ($user->type === 'admin')
          <a href="{{ route('admin-products') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6l5.4 5.4V19a2 2 0 01-2 2z" />
            </svg>
            Catálogo de productos
          </a>

          <a href="{{ route('admin-promos') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6l5.4 5.4V19a2 2 0 01-2 2z" />
            </svg>
            Promocional
          </a>
        @endif

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="w-full text-left group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-red-600 transition-all">
            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-red-500" fill="none" stroke-width="1.5" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-7.5A2.25 2.25 0 003.75 5.25v13.5A2.25 2.25 0 006 21h7.5a2.25 2.25 0 002.25-2.25V15M18 12h-9m0 0l3-3m-3 3l3 3" />
            </svg>
            Cerrar sesión
          </button>
        </form>
      </div>

      <!-- Divider -->
      <div class="mt-8 border-t border-gray-200 pt-6 px-4 space-y-1">
        <a href="{{ route('profile') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
          <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0..." />
          </svg>
          Configuración
        </a>

        <a href="{{ route('faq') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
          <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2..." />
          </svg>
          Centro de ayuda
        </a>

        <a href="{{ route('policies') }}" class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 hover:text-cyan-700 transition-all">
          <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4..." />
          </svg>
          Privacidad
        </a>
      </div>
    </nav>
  </div>
</div>
