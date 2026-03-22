<x-guest-layout>
    {{-- Sección: Comprar productos --}}
    <div class="w-9/12 mt-20 mx-auto overflow-hidden sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-indio-oscuro tracking-tight">
                Comprar <span class="text-yellow-500">Productos</span>
            </h2>
            <div class="mt-3 h-1 w-24 bg-linear-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full shadow-lg"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $p)
                <div class="p-2">
                    @include('comps.store.productcard', ['producto' => $p])
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
</x-guest-layout>
