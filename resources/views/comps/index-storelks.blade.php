<!-- Sección: Comprar por Tipo de Producto -->
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 uppercase tracking-tight text-center mb-10">
      Comprar por Tipo de Producto
    </h2>
    <div class="mt-2 h-1 w-24 bg-gradient-to-r from-sky-400 to-blue-500 mx-auto rounded-full"></div>

            <div class="grid gap-6 grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['nombre' => 'Oro', 'imagen' => asset('assets/centenario-view.png'), 'filtro' => 'oro', 'link' => route('collections-gold')],
                    ['nombre' => 'Plata', 'imagen' => asset('assets/plata-view.jpg'), 'filtro' => 'plata', 'link' => route('collections-silver')],
                    ['nombre' => 'Colecciones', 'imagen' => 'https://www.banxico.org.mx/multimedia/rev_1kg_oro.png', 'filtro' => 'especiales', 'link' => route('collections-numis')],
                    ['nombre' => 'Billetes', 'imagen' => 'https://m.media-amazon.com/images/I/71xTuJez-EL.jpg', 'filtro' => 'billetes', 'link' => route('collections-bucks')],
                ] as $item)
                    <a href="{{ $item['link'] }}" class="cursor-pointer bg-gray-100 hover:bg-gray-200 rounded-xl overflow-hidden shadow hover:shadow-lg transition" onclick="filtrarProductos('{{ $item['filtro'] }}')">
                        <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="h-56s w-full object-cover">
                        <div class="text-center py-4">
                            <h3 class="text-lg font-semibold text-indio-oscuro">{{ $item['nombre'] }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
