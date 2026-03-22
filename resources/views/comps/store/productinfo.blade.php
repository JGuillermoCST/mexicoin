{{-- ── Sección de detalle de producto ── --}}
<section class="py-8 sm:py-12 lg:py-20">
    <div class="max-w-7/12 mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- ── Visor de imágenes (arriba en móvil, derecha en desktop) ── --}}
            <div class="w-full order-first lg:order-last">
                @include('comps.store.imageviewer', ['images' => $imgs])
            </div>

            {{-- ── Info del producto ── --}}
            <div class="flex flex-col order-last lg:order-first">

                {{-- Breadcrumb --}}
                <p class="text-sm font-medium text-indigo-600 mb-3">
                    Colecciones &nbsp;/&nbsp; {{ $category }}
                </p>

                {{-- Nombre --}}
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-snug mb-3">
                    {{ $product['name'] }}
                </h1>

                {{-- Precio --}}
                <div class="flex items-center gap-3 mb-5 pb-5 border-b border-gray-100">
                    <span class="text-2xl sm:text-3xl font-bold text-gray-900">
                        ${{ $product['price'] }}
                    </span>
                </div>

                {{-- Descripción --}}
                <p class="text-gray-500 text-sm sm:text-base leading-relaxed mb-6">
                    {{ $product['description'] }}
                </p>

                {{-- Stock --}}
                <div class="inline-flex items-center gap-2 bg-red-50 border border-red-100 rounded-xl px-4 py-2.5 mb-6 w-fit">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse flex-shrink-0"></span>
                    <span class="text-sm font-semibold text-red-600">LIVE Stock:</span>
                    <span class="text-sm font-bold text-gray-900">{{ $product['stock'] }} piezas</span>
                </div>

                {{-- Cantidad + botón agregar ── --}}
                <form id="postCart" action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id"    value="{{ $product['id'] }}">
                    <input type="hidden" name="name"  value="{{ $product['name'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="image" value="{{ $product['image'] }}">

                    <div class="flex flex-col sm:flex-row gap-3">

                        {{-- Selector de cantidad --}}
                        <div class="flex items-center rounded-full border border-gray-300 overflow-hidden w-full sm:w-auto self-start">
                            <button type="button" id="qtyless"
                                class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition flex-shrink-0">
                                <svg width="18" height="18" viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M16.5 11H5.5"/>
                                </svg>
                            </button>

                            <input
                                type="text"
                                id="qty"
                                name="qty"
                                min="1"
                                value="1"
                                class="w-16 sm:w-14 h-12 sm:h-14 text-center font-semibold text-gray-900 text-base border-x border-gray-300 bg-transparent outline-none focus:bg-gray-50"
                            >

                            <button type="button" id="qtymore"
                                class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition flex-shrink-0">
                                <svg width="18" height="18" viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M11 5.5V16.5M16.5 11H5.5"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Botón agregar al carrito --}}
                        <button type="button" id="addToCart"
                            class="flex-1 flex items-center justify-center gap-2.5 h-12 sm:h-14 px-6 rounded-full bg-indigo-50 text-indigo-600 font-semibold text-sm sm:text-base hover:bg-indigo-100 active:scale-95 transition-all duration-200 shadow-sm hover:shadow-indigo-200">
                            <svg width="20" height="20" viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                <path d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"/>
                            </svg>
                            Añadir al carrito
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

{{-- ── Tabla de precios por método de pago ── --}}
@isset($allPrices)
    @if($allPrices != [])
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">Precios finales según método de pago</h2>
                </div>

                {{-- Tabla en desktop --}}
                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tarjeta bancaria</th>
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Transferencia</th>
                                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Criptomonedas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-gray-900 text-base">${{ $allPrices['card'] ?? '—' }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900 text-base">${{ $allPrices['transfer'] ?? '—' }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900 text-base">${{ $allPrices['crypto'] ?? '—' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Cards en móvil --}}
                <div class="sm:hidden divide-y divide-gray-100">
                    @foreach([
                        ['label' => 'Tarjeta bancaria', 'icon' => '💳', 'key' => 'card'],
                        ['label' => 'Transferencia',    'icon' => '🏦', 'key' => 'transfer'],
                        ['label' => 'Criptomonedas',    'icon' => '₿',  'key' => 'crypto'],
                    ] as $method)
                        <div class="flex items-center justify-between px-5 py-4">
                            <div class="flex items-center gap-3">
                                <span class="text-xl">{{ $method['icon'] }}</span>
                                <span class="text-sm font-medium text-gray-600">{{ $method['label'] }}</span>
                            </div>
                            <span class="text-base font-bold text-gray-900">
                                ${{ $allPrices[$method['key']] ?? '—' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset

@push('scripts')
<script>
(function () {
    var input  = document.getElementById('qty');
    var more   = document.getElementById('qtymore');
    var less   = document.getElementById('qtyless');
    var addBtn = document.getElementById('addToCart');
    var form   = document.getElementById('postCart');

    more.addEventListener('click', function () {
        input.value = Number(input.value) + 1;
    });

    less.addEventListener('click', function () {
        var qty = Number(input.value);
        if (qty > 1) input.value = qty - 1;
    });

    addBtn.addEventListener('click', function () {
        form.submit();
    });
})();
</script>
@endpush