<div class="block md:hidden relative mx-auto w-11/12" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[32rem] overflow-hidden rounded-lg md:h-96">
        
         <!-- Item 1 -->
        @foreach ($featured as $producto)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm ">

                    <div class="w-11/12 mx-auto max-w-sm bg-white rounded-lg shadow-sm">
                        <img src="{{ asset('assets/products/mains/'. $producto['image']) }}" alt="{{ asset('assets/products/mains/'. $producto['image']) }}" class="p-8 w-full h-[20rem] object-cover rounded-xl"  />
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ Str::limit($producto['name'], 20, '') }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-gray-900">${{ $producto['price'] }}</span>
                                {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a> --}}
                                <a href="{{ route('product.detail', ['id' => $producto['id']]) }}">
                                    {{-- @csrf
                                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                                    <input type="hidden" name="image" value="{{ $producto['image'] }}"> --}}
                                    <button type="submit" class="ml-auto rounded-full inline-block py-2 bg-indio-verde text-white px-4 hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Comprar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($featured as $item)
            {{-- {{ $loop->iteration-1 }} --}}
            @if ($loop->iteration > 1)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration-1 }}"></button>
            @else
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration-1 }}"></button>
            @endif

        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none animate-none" data-carousel-prev style="animation: none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next style="animation: none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

{{-- Medium screens --}}
<div class="hidden md:block lg:hidden relative mx-auto w-11/12" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[26rem] overflow-hidden rounded-lg">
        
         <!-- Item 1 -->
        <div class="duration-700 ease-in-out flex flex-row" data-carousel-item>

            @foreach ($featured as $producto)

                @if ($loop->iteration <= 3)
                    <div class=" w-4/12 bg-white mx-auto">

                    <div class="w-11/12 mx-auto max-w-sm bg-white rounded-lg shadow-sm border border-gray-200">
                        <img class="w-full p-2 h-[13rem] object-cover rounded-xl" src="{{ asset('assets/products/mains/'. $producto['image']) }}" alt="{{ asset('assets/products/mains/'. $producto['image']) }}" />
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900">{{ Str::limit($producto['name'], 20, '') }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex flex-col items-center justify-between">
                                <span class="text-xl font-bold text-gray-900">${{ $producto['price'] }}</span>
                                {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a> --}}
                                <a href="{{ route('product.detail', ['id' => $producto['id']]) }}">
                                    {{-- @csrf
                                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                                    <input type="hidden" name="image" value="{{ $producto['image'] }}"> --}}
                                    <button type="submit" class="ml-auto rounded-full inline-block py-2 bg-indio-verde text-white px-4 hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Comprar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
            @endforeach
        </div>

         <!-- Item 2 -->
        <div class="duration-700 ease-in-out flex flex-row" data-carousel-item>

            @foreach ($featured as $producto)

                @if ($loop->iteration > 3 && $loop->iteration <= 6)
                    <div class=" w-4/12 bg-white mx-auto">

                    <div class="w-11/12 mx-auto max-w-sm bg-white rounded-lg shadow-sm border border-gray-200">
                        <img class="w-full p-2 h-[13rem] object-cover rounded-xl" src="{{ asset('assets/products/mains/'. $producto['image']) }}" alt="{{ asset('assets/products/mains/'. $producto['image']) }}" />
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900">{{ Str::limit($producto['name'], 20, '') }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex flex-col items-center justify-between">
                                <span class="text-xl font-bold text-gray-900">${{ $producto['price'] }}</span>
                                {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a> --}}
                                <a href="{{ route('product.detail', ['id' => $producto['id']]) }}">
                                    {{-- @csrf
                                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                                    <input type="hidden" name="image" value="{{ $producto['image'] }}"> --}}
                                    <button type="submit" class="ml-auto rounded-full inline-block py-2 bg-indio-verde text-white px-4 hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Comprar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
            @endforeach
        </div>
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($featured as $item)
            {{-- {{ $loop->iteration-1 }} --}}
            @if ($loop->iteration > 1)
                @if ($loop->iteration <= 2)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration-1 }}"></button>
                @endif
            @else
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration-1 }}"></button>
            @endif

        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none animate-none" data-carousel-prev style="animation: none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next style="animation: none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

{{-- Large screens --}}
<div class="hidden lg:block relative mx-auto w-10/12 xl:w-8/12" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[28rem] xl:h-[32rem] overflow-hidden rounded-lg">
        
         <!-- Item 1 -->
        <div class="duration-700 ease-in-out flex flex-row" data-carousel-item>

            @foreach ($featured as $producto)

                @if ($loop->iteration <= 3)
                    <div class=" w-4/12 bg-white mx-auto">

                    <div class="w-11/12 mx-auto max-w-sm bg-white rounded-lg shadow-sm border border-gray-200">
                        <img class="w-full p-2 h-[15rem] xl:h-[19rem] object-cover rounded-xl" src="{{ asset('assets/products/mains/'. $producto['image']) }}" alt="{{ asset('assets/products/mains/'. $producto['image']) }}" />
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl xl:text-2xl font-semibold tracking-tight text-gray-900">{{ Str::limit($producto['name'], 20, '') }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xl xl:text-2xl font-bold text-gray-900">${{ $producto['price'] }}</span>
                                {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a> --}}
                                <a href="{{ route('product.detail', ['id' => $producto['id']]) }}">
                                    {{-- @csrf
                                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                                    <input type="hidden" name="image" value="{{ $producto['image'] }}"> --}}
                                    <button type="submit" class="ml-auto rounded-full inline-block py-2 bg-indio-verde text-white px-4 hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Comprar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
            @endforeach
        </div>

         <!-- Item 2 -->
        <div class="duration-700 ease-in-out flex flex-row" data-carousel-item>

            @foreach ($featured as $producto)

                @if ($loop->iteration > 3 && $loop->iteration <= 6)
                    <div class=" w-4/12 bg-white mx-auto">

                    <div class="w-11/12 mx-auto max-w-sm bg-white rounded-lg shadow-sm border border-gray-200">
                        <img class="w-full p-2 h-[15rem] xl:h-[19rem] object-cover rounded-xl" src="{{ asset('assets/products/mains/'. $producto['image']) }}" alt="{{ asset('assets/products/mains/'. $producto['image']) }}" />
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl xl:text-2xl font-semibold tracking-tight text-gray-900">{{ Str::limit($producto['name'], 20, '') }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xl xl:text-2xl font-bold text-gray-900">${{ $producto['price'] }}</span>
                                {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a> --}}
                                <a href="{{ route('product.detail', ['id' => $producto['id']]) }}">
                                    {{-- @csrf
                                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                                    <input type="hidden" name="image" value="{{ $producto['image'] }}"> --}}
                                    <button type="submit" class="ml-auto rounded-full inline-block py-2 bg-indio-verde text-white px-4 hover:bg-indio-gris focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Comprar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
            @endforeach
        </div>
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($featured as $item)
            {{-- {{ $loop->iteration-1 }} --}}
            @if ($loop->iteration > 1)
                @if ($loop->iteration <= 2)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration-1 }}"></button>
                @endif
            @else
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->iteration-1 }}"></button>
            @endif

        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none animate-none" data-carousel-prev style="animation: none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next style="animation: none">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
