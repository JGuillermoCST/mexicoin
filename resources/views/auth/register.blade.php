<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center bg-linear-to-br from-blue-50 via-gray-100 to-blue-100 relative overflow-hidden">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0 bg-[url('/assets/bg-pattern.svg')] bg-cover bg-center opacity-10"></div>

    <!-- Tarjeta principal -->
    <div class="relative z-10 w-full max-w-md bg-white/70 backdrop-blur-md rounded-2xl shadow-2xl border border-white/40 p-8">
      <div class="flex flex-col items-center mb-6">
        <img src="{{ asset('assets/logo/logo-angel-ts.PNG') }}" alt="Logo" class="w-24 rounded-full shadow-md mb-2">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-wide">Crea tu cuenta en <span class="text-yellow-500">Mexicoin</span></h2>
        <p class="text-sm text-gray-600 mt-1">Regístrate para comenzar</p>
      </div>

      <!-- Validaciones -->
      <x-validation-errors class="mb-4 text-red-500" />

      <!-- Formulario -->
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre completo</label>
          <input id="name" class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                 type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu nombre completo">
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
          <input id="email" class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                 type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="ejemplo@correo.com">
        </div>

        <!-- Contraseña -->
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
          <input id="password" class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                 type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
        </div>

        <!-- Confirmar contraseña -->
        <div class="mb-4">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
          <input id="password_confirmation" class="mt-1 w-full rounded-lg bg-white border border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                 type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
        </div>

        <!-- Términos y políticas -->
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
          <div class="mt-4 flex items-start">
            <input id="terms" type="checkbox" name="terms" required class="h-4 w-4 text-yellow-500 border-gray-400 rounded focus:ring-yellow-500">
            <label for="terms" class="ml-2 text-sm text-gray-700 leading-snug">
              Acepto los 
              <a target="_blank" href="{{ route('terms.show') }}" class="text-yellow-500 hover:text-yellow-600 underline">Términos de Servicio</a> 
              y la 
              <a target="_blank" href="{{ route('policy.show') }}" class="text-yellow-500 hover:text-yellow-600 underline">Política de Privacidad</a>.
            </label>
          </div>
        @endif

        <!-- Botón -->
        <div class="mt-6">
          <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold py-2.5 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
            Crear Cuenta
          </button>
        </div>

        <!-- Ya tienes cuenta -->
        <p class="text-center text-gray-600 text-sm mt-6">
          ¿Ya tienes una cuenta?
          <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-600 font-medium">Inicia sesión</a>
        </p>
      </form>
    </div>
  </div>
</x-guest-layout>
