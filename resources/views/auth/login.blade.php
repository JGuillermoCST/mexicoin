<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-gray-100 to-blue-100 relative overflow-hidden">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0 bg-[url('/assets/bg-pattern.svg')] bg-cover bg-center opacity-10"></div>

    <!-- Tarjeta principal (Glass suave claro) -->
    <div class="relative z-10 w-full max-w-md bg-white/70 backdrop-blur-md rounded-2xl shadow-2xl border border-white/40 p-8">
      <div class="flex flex-col items-center mb-6">
        <img src="{{ asset('assets/logo/logo-angel-ts.png') }}" alt="Logo" class="w-24 rounded-full shadow-md mb-2">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-wide">Bienvenido a <span class="text-yellow-500">Mexicoin</span></h2>
        <p class="text-sm text-gray-600 mt-1">Inicia sesión en tu cuenta</p>
      </div>

      <!-- Validaciones -->
      <x-validation-errors class="mb-4 text-red-500" />

      @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">{{ $value }}</div>
      @endsession

      <!-- Formulario -->
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
          <input id="email" class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                 type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="ejemplo@correo.com">
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
          <input id="password" class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                 type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
        </div>

        <!-- Recordarme -->
        <div class="flex items-center justify-between mb-4">
          <label for="remember_me" class="flex items-center text-sm text-gray-700">
            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-400 text-yellow-500 focus:ring-yellow-500">
            <span class="ml-2">Recordarme</span>
          </label>

          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-yellow-500 hover:text-yellow-600 transition">¿Olvidaste tu contraseña?</a>
          @endif
        </div>

        <!-- Botón -->
        <div class="mt-6">
          <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold py-2.5 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
            Iniciar Sesión
          </button>
        </div>

        <!-- Registro -->
        @if (Route::has('register'))
          <p class="text-center text-gray-600 text-sm mt-6">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-600 font-medium">Regístrate</a>
          </p>
        @endif
      </form>
    </div>
  </div>
</x-guest-layout>
