<x-guest-layout>
  <section id="contacto" class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-100 to-blue-100 relative overflow-hidden py-16">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0 bg-[url('/assets/bg-pattern.svg')] bg-cover bg-center opacity-10"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-8">
      <!-- Título principal -->
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 tracking-tight">
          Contáctanos
        </h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
          Estamos disponibles para atenderte por <a href="" class="text-green-500 font-bold hover:text-green-700 hover:border-green-700 hover:border-b-2">Whatsapp</a>.  
          También puedes enviarnos un mensaje directamente al correo soporte@mexicoin.com.mx.
        </p>
      </div>

      <!-- Información de contacto -->
      {{-- <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Sucursal Monterrey -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/40 shadow-md p-6 hover:shadow-lg transition">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Sucursal Monterrey</h3>
          <p class="text-gray-600">Av. Principal 123, Monterrey, NL</p>
          <p class="text-gray-600">Tel: (81) 1234 5678</p>
          <p class="text-gray-600">Email: contacto@empresa.com</p>
        </div>

        <!-- Sucursal CDMX -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/40 shadow-md p-6 hover:shadow-lg transition">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Sucursal CDMX</h3>
          <p class="text-gray-600">Calle Reforma 456, CDMX</p>
          <p class="text-gray-600">Tel: (55) 9876 5432</p>
          <p class="text-gray-600">Email: contacto@empresa.com</p>
        </div>
      </div> --}}

      <!-- Formulario de contacto -->
      <div class="bg-white/80 backdrop-blur-lg rounded-2xl border border-white/50 shadow-xl p-10 max-w-3xl mx-auto">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Envíanos un mensaje</h3>

        <form action="" method="POST">
          @csrf
          <div class="grid md:grid-cols-2 gap-6">
            <!-- Nombre -->
            <div>
              <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
              <input type="text" id="nombre" name="nombre"
                class="w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                required>
            </div>

            <!-- Correo electrónico -->
            <div>
              <label for="email" class="block text-gray-700 font-medium mb-2">Correo Electrónico</label>
              <input type="email" id="email" name="email"
                class="w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                required>
            </div>
          </div>

          <!-- Mensaje -->
          <div class="mt-6">
            <label for="mensaje" class="block text-gray-700 font-medium mb-2">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="6"
              class="w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
              required></textarea>
          </div>

          <!-- Botón de envío -->
          <div class="text-center mt-8">
            <button type="submit"
              class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold px-8 py-3 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
              Enviar Mensaje
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-guest-layout>
