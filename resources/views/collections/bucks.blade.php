<x-guest-layout>
  <section class="bg-gray-50 py-16 px-4">
    <div class="max-w-7xl mx-auto">
      
      <!-- Encabezado -->
      <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-extrabold text-indio-oscuro tracking-tight">
          Comprar <span class="text-yellow-500">Productos</span>
        </h2>
        <div class="mt-3 h-1 w-24 bg-linear-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full shadow-lg"></div>
      </div>

      <!-- Grid de productos -->
      <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($products as $p)
          @include('comps.store.productcard', ['producto' => $p])
        @endforeach
      </div>

      <!-- Paginación -->
      <div class="mt-12 flex justify-center">
        {{ $products->links() }}
      </div>
    </div>
  </section>
</x-guest-layout>
