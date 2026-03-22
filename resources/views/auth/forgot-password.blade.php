<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center bg-linear-to-br from-blue-50 via-gray-100 to-blue-100 relative overflow-hidden">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0 bg-[url('/assets/bg-pattern.svg')] bg-cover bg-center opacity-10"></div>

    <!-- Tarjeta principal -->
    <div class="relative z-10 w-full max-w-md bg-white/70 backdrop-blur-md rounded-2xl shadow-2xl border border-white/40 p-8">
      <div class="flex flex-col items-center mb-6">
        <img src="{{ asset('assets/logo/logo-angel-ts.PNG') }}" alt="Logo" class="w-24 rounded-full shadow-md mb-2">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-wide">¿Olvidaste tu contraseña?</h2>
        <p class="text-sm text-gray-600 mt-1 text-center">No te preocupes. Ingresa tu correo y te enviaremos un enlace para restablecerla.</p>
      </div>

      <!-- Estado -->
      @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">{{ $value }}</div>
      @endsession

      <!-- Validaciones -->
      <x-validation-errors class="mb-4 text-red-500" />

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email -->
        <div class="mb-6">
          <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
          <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                 class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 
                        focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                 placeholder="ejemplo@correo.com">
        </div>

        <!-- Botón -->
        <div class="mt-6">
          <button type="submit"
                  class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold py-2.5 
                         rounded-lg shadow-md transition transform hover:-translate-y-0.5">
            Enviar enlace de recuperación
          </button>
        </div>

        <!-- Volver al login -->
        <p class="text-center text-gray-600 text-sm mt-6">
          ¿Ya recuerdas tu contraseña?
          <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-600 font-medium">
            Inicia sesión
          </a>
        </p>
      </form>
    </div>
  </div>
</x-guest-layout>
