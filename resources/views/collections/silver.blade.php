<x-guest-layout>

    @php
        $sliberty = [
            [ "name" => "Libertad 1 onza", "diameter" => "36", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/2 onza", "diameter" => "30", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/4 onza", "diameter" => "25", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/10 onza", "diameter" => "20", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/20 onza", "diameter" => "16", "finish" => "Espejo - Satín" ]
        ];

        $slibertynew = [
            [ "name" => "Libertad 1 Kg.", "diameter" => "110", "finish" => "Espejo - Satín - Mate/brillo" ],
            [ "name" => "Libertad 5 onzas", "diameter" => "65", "finish" => "Espejo - Satín - Mate/brillo" ],
            [ "name" => "Libertad 2 onzas", "diameter" => "48", "finish" => "Espejo - Satín - Mate/brillo" ],
            [ "name" => "Libertad 1 onza", "diameter" => "40", "finish" => "Espejo - Satín - Mate/brillo" ],
            [ "name" => "Libertad 1/2 onza", "diameter" => "33", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/4 onza", "diameter" => "27", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/10 onza", "diameter" => "20", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/20 onza", "diameter" => "16", "finish" => "Espejo - Satín" ]
        ];
    @endphp

    <div id="animation-carousel" class="relative w-full lg:w-10/12 xl:w-9/12 mx-auto" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden rounded-base h-[710px] md:h-[670px]">
            <!-- Item 1 -->
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                {{-- Sección: Información de la Serie Libertad Plata --}}
                <div id="plata" class="flex-col w-full max-w-6xl mx-auto mt-12 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-[#1C3144] tracking-tight">
                            Serie Libertad <span class="text-gray-400">Plata</span>
                        </h2>
                        <div class="mt-3 h-1 w-24 bg-gradient-to-r from-gray-300 to-gray-500 mx-auto rounded-full shadow-lg"></div>
                    </div>

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow-lg overflow-hidden border border-gray-200 sm:rounded-2xl">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gradient-to-r from-gray-100 to-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Plata</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Acabado</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Diámetro (mm)</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Ley</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($sliberty as $coin)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $coin['name'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coin['finish'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coin['diameter'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">.999</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                {{-- Sección: Información de la Serie Libertad Plata NUEVO --}}
                <div id="plata" class="flex-col w-full max-w-6xl mx-auto mt-12 absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div class="text-center mb-12">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-[#1C3144] tracking-tight">
                            Serie Libertad <span class="text-gray-400">Plata (1996-presente)</span>
                        </h2>
                        <div class="mt-3 h-1 w-24 bg-gradient-to-r from-gray-300 to-gray-500 mx-auto rounded-full shadow-lg"></div>
                    </div>

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow-lg overflow-hidden border border-gray-200 sm:rounded-2xl">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gradient-to-r from-gray-100 to-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Plata</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Acabado</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Diámetro (mm)</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Ley</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($slibertynew as $coin)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $coin['name'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coin['finish'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coin['diameter'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">.999</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- Sección: Comprar productos --}}
    <div class="w-9/12 mt-20 mx-auto overflow-hidden sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#1C3144] tracking-tight">
                Comprar <span class="text-gray-400">Productos</span>
            </h2>
            <div class="mt-3 h-1 w-24 bg-gradient-to-r from-gray-300 to-gray-500 mx-auto rounded-full shadow-lg"></div>
        </div>

        <div class="-mx-px border-l border-gray-300 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($products as $p)
                @include('comps.store-productcard', ['producto' => $p])
            @endforeach
        </div>

        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>

    @push('scripts')
        
    @endpush
</x-guest-layout>
