<!-- Panel de carrito oculto -->
<div id="cartPanel" class="fixed -right-2 md:-right-3 xl:-right-3.5 top-0 rounded-2xl m-2 md:m-4 h-vh w-11/12 md:w-5/12 lg:w-3/12 bg-white shadow-lg border-l-2 border-t border-indio-gris/40 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
    <div class="flex justify-between items-center p-4">
        <h3 class="text-lg font-semibold text-indio-oscuro">Mi carrito</h3>
        <button id="closeCart" class="text-gray-500 hover:text-red-500 font-black">
            ✕
        </button>
    </div>
    <div class="p-4 space-y-4">
        <div class="p-4 space-y-4">
            {{-- {{ var_dump(Session::get('cart', [])); }} --}}
            {{-- {{ var_dump(Session::get('subtotal', 'Error!')); }}
            {{ var_dump(Session::get('cart_count', ' Carrito vacío!')); }} --}}
            @if(Session::has('cart'))
                @php
                    $cart = Session::get('cart', []);
                @endphp

                @if(count($cart) > 0)
                    <ul>
                        @foreach($cart as $item)
                            <li class="flex items-center justify-between py-2">
                                <div class="flex items-center space-x-4">
                                    @if($item['image'])
                                        {{-- <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover"> --}}
                                        <img src="{{ file_exists('assets/products/mains/'.$item['image']) ? asset('assets/products/mains/'. $item['image']) : asset($item['image']) }}" alt="{{ asset('assets/products/mains/'.$item['image']) }}" class="w-16 h-16 object-cover">
                                    @endif
                                    <div>
                                        <p class="font-s/mibold">{{ $item['name'] }}</p>
                                        <p>${{ $item['price'] }} x {{ $item['quantity'] }}</p>
                                    </div>
                                </div>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Tu carrito está vacío 🛒</p>
                @endif

            @else
                <p>Tu carrito está vacío 🛒</p>
            @endif
        
            <!-- Total -->
            <div class="border-t border-indio-oscuro/80 pt-4">
                <div class="flex justify-between text-indio-oscuro font-semibold">
                    <span>Total:</span>
                    <span>
                        @if(Session::has('subtotal'))
                            {{-- ${{ array_sum(array_column($cart, 'price')) }} --}}
                            ${{ number_format(Session::get('subtotal'),2) }}
                        @else
                            $0
                        @endif
                    </span>
                </div>
                <a href="{{ route('checkout') }}" class="mt-4 block text-center w-full bg-indio-verde text-white py-2 rounded hover:bg-green-700 transition">Proceder al pago</a>

            </div>
        </div>
    </div>
</div>