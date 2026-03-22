<div class="group relative p-4 border-r border-b border-gray-300 sm:p-6">
    <a href="{{ route('product.detail', ['id' => $producto['id']]) }}">
        <div class="rounded-lg overflow-hidden bg-gray-300 aspect-w-1 aspect-h-1 group-hover:opacity-75">
            <img src="{{ asset('assets/products/mains/'.$producto['image']) }}" alt="{{ asset('assets/products/mains/'.$producto['image']) }}" class="w-full h-full object-center object-cover">
        </div>
        <div class="pt-10 pb-4 text-center">
            <h3 class="text-lg font-medium text-gray-900">{{ $producto['name'] }}</h3>
            
            <div class="mt-3 flex flex-col items-center">
                <p class="sr-only">5 out of 5 stars</p>
                    <div class="flex items-center">
                    <!-- Heroicon name: solid/star -->
                    <svg class="text-yellow-400 shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
        
                    <!-- Heroicon name: solid/star -->
                    <svg class="text-yellow-400 shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
        
                    <!-- Heroicon name: solid/star -->
                    <svg class="text-yellow-400 shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
        
                    <!-- Heroicon name: solid/star -->
                    <svg class="text-yellow-400 shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
        
                    <!-- Heroicon name: solid/star -->
                    <svg class="text-yellow-400 shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    </div>
                <p class="mt-1 text-sm text-gray-500">{{ rand(13, 130) }} opiniones</p>
            </div>
                
            <p class="text-lg font-medium text-green-800">${{ $producto['price'] }}</p>
                
            <div class="mt-4 w-full flex">
                {{-- <a href="" class="mr-auto inline-block bg-indio-oscuro text-white px-4 py-2 rounded-md hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Detalles</a> --}}
                {{-- <a href="" ">Añadir al carrito</a> --}}
                <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                    <input type="hidden" name="image" value="{{ $producto['image'] }}">
                    <button type="submit" class="mx-auto w-full inline-block bg-indio-verde text-white px-4 py-2 rounded-md hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Agregar al carrito
                    </button>
                </form>
            </div>
        </div>
    </a>
</div>