<x-guest-layout>
  <div class="min-h-screen bg-linear-to-br from-blue-50 via-gray-100 to-blue-100 relative overflow-hidden">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0 bg-[url('/assets/bg-pattern.svg')] bg-cover bg-center opacity-10"></div>

    <div class="relative z-10 w-11/12 max-w-7xl mx-auto py-16">
      <!-- Título -->
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 tracking-tight">
          Comprar <span class="text-yellow-500">Productos</span>
        </h2>
        <p class="text-gray-600 mt-2">Explora nuestra selección y encuentra justo lo que necesitas.</p>
      </div>

      <!-- Grid de productos -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach ($products as $p)
          <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/40 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 hover:scale-[1.02]">
            @include('comps.store.productcard', ['producto' => $p])
          </div>
        @endforeach
      </div>

      <!-- Paginación -->
      <div class="mt-12 flex justify-center">
        {{ $products->links() }}
      </div>
    </div>

  </div>
</x-guest-layout>
