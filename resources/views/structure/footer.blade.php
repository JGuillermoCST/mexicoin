<!-- Footer principal -->
<footer class="bg-gray-950 text-gray-300 pt-12 pb-6 border-t border-yellow-600/40">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">
    
    <!-- Logo -->
    <div class="flex flex-col items-center md:items-start space-y-3">
      <img src="{{ asset('assets/logo/logo-angel-ts.png') }}" alt="logo" class="w-32 rounded-lg shadow-lg border border-yellow-600/50">
      <p class="text-sm text-gray-400">Tu portal confiable en metales preciosos y coleccionismo.</p>
    </div>

    <!-- Navegación -->
    <div class="grid grid-cols-2 gap-6 text-sm text-gray-400 md:col-span-2">
      <div>
        <h3 class="text-yellow-500 font-semibold mb-3 uppercase tracking-wider">Productos</h3>
        <ul class="space-y-2">
          <li><a href="{{ route('main') }}" class="hover:text-yellow-500 transition">Inicio</a></li>
          <li><a href="{{ route('store') }}" class="hover:text-yellow-500 transition">Tienda</a></li>
          <li><a href="{{ route('dashboard') }}" class="hover:text-yellow-500 transition">Cuenta</a></li>
          <li><a href="{{ route('collections-gold') }}" class="hover:text-yellow-500 transition">Oro</a></li>
          <li><a href="{{ route('collections-silver') }}" class="hover:text-yellow-500 transition">Plata</a></li>
          <li><a href="{{ route('collections-numis') }}" class="hover:text-yellow-500 transition">Numismática</a></li>
          <li><a href="{{ route('collections-bucks') }}" class="hover:text-yellow-500 transition">Billetes</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-yellow-500 font-semibold mb-3 uppercase tracking-wider">Soporte</h3>
        <ul class="space-y-2">
          <li><a href="{{ route('contact') }}" class="hover:text-yellow-500 transition">Contáctanos</a></li>
          <li><a href="{{ route('policies') }}" class="hover:text-yellow-500 transition">Políticas</a></li>
          <li><a href="{{ route('faq') }}" class="hover:text-yellow-500 transition">FAQ</a></li>
        </ul>
      </div>
    </div>

    <!-- Beneficios y métodos -->
    <div class="flex flex-col items-center md:items-end space-y-4">
      <!-- Beneficios -->
      <div class="space-y-3 w-full max-w-xs">
        <a href="{{ route('membership') }}" class="flex items-center justify-between bg-gray-800/60 border border-yellow-600/40 rounded-lg p-3 hover:bg-gray-800 transition">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-truck text-yellow-500 text-xl"></i>
            <div>
              <p class="text-gray-100 text-sm font-semibold">Envío Gratuito</p>
              <p class="text-xs text-gray-400">Con membresía pro</p>
            </div>
          </div>
        </a>
        <a href="{{ route('returns-pol') }}" class="flex items-center justify-between bg-gray-800/60 border border-yellow-600/40 rounded-lg p-3 hover:bg-gray-800 transition">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-rotate-left text-yellow-500 text-xl"></i>
            <div>
              <p class="text-gray-100 text-sm font-semibold">Devoluciones en 7 días</p>
              <p class="text-xs text-gray-400">Recupera tu pieza</p>
            </div>
          </div>
        </a>
        <a href="{{ route('contact') }}" class="flex items-center justify-between bg-gray-800/60 border border-yellow-600/40 rounded-lg p-3 hover:bg-gray-800 transition">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-headset text-yellow-500 text-xl"></i>
            <div>
              <p class="text-gray-100 text-sm font-semibold">Soporte 24/7</p>
              <p class="text-xs text-gray-400">Para nuestros clientes</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Métodos de pago -->
      <div class="pt-3">
        <h3 class="text-yellow-500 font-semibold uppercase tracking-wider text-sm mb-2">Métodos de pago</h3>
        <img src="{{ asset('assets/methods.png') }}" alt="Métodos de pago" class="h-6 filter brightness-110">
        <div class="text-xs text-gray-500 mt-1">
          <a target="_blank" href="https://www.paypal.com/mx/home" class="hover:text-yellow-500">PayPal</a> · 
          <a target="_blank" href="https://www.mercadopago.com.mx/" class="hover:text-yellow-500">MercadoPago</a> · 
          <a target="_blank" href="https://www.clip.mx/" class="hover:text-yellow-500">Clip</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Línea inferior -->
  <div class="border-t border-gray-800 mt-10 pt-6 text-center text-sm text-gray-400">
    <p>Mexicoin © {{ date('Y') }} - Todos los derechos reservados</p>
    <p>Hecho con dedicación por <span class="text-yellow-500 font-semibold">CSTLABS</span> — Guadalajara, MX</p>
  </div>
</footer>

@include('comps.wp-float')
