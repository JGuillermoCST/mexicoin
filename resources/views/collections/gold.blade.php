<x-guest-layout>
    @php
        $gliberty = [
            [ "name" => "Libertad 1 onza", "diameter" => "34.5", "finish" => "Espejo - Satín - Mate/brillo" ],
            [ "name" => "Libertad 1/2 onza", "diameter" => "29", "finish" => "Espejo - Satín - Mate/brillo" ],
            [ "name" => "Libertad 1/4 onza", "diameter" => "23", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/10 onza", "diameter" => "16", "finish" => "Espejo - Satín" ],
            [ "name" => "Libertad 1/20 onza", "diameter" => "13", "finish" => "Espejo - Satín" ]
        ];

        $glibertynew = [
            [ "name" => "Libertad 1 onza", "diameter" => "34.5" ],
            [ "name" => "Libertad 1/2 onza", "diameter" => "29" ],
            [ "name" => "Libertad 1/4 onza", "diameter" => "23" ],
            [ "name" => "Libertad 1/10 onza", "diameter" => "16" ],
            [ "name" => "Libertad 1/20 onza", "diameter" => "13" ]
        ];

        $gcenty = [
            [ "name" => "Centenario (50 pesos)", "diameter" => "37", "weight" => "1.2057" ],
            [ "name" => "Azteca (20 pesos)", "diameter" => "27.5", "weight" => "0.4823" ],
            [ "name" => "Hidalgo (10 pesos)", "diameter" => "22.5", "weight" => "0.2411" ],
            [ "name" => "1/2 Hidalgo (5 pesos)", "diameter" => "19", "weight" => "0.1206" ],
            [ "name" => "1/4 Hidalgo (2.5 pesos)", "diameter" => "15.5", "weight" => "0.0603" ],
            [ "name" => "1/5 Hidalgo (2 pesos)", "diameter" => "13", "weight" => "0.0482" ]
        ];
    @endphp
    
    {{-- Sección: Información de la Serie Libertad Oro --}}
    <div id="oro" class="flex flex-col w-full max-w-6xl mx-auto mt-12">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#1C3144] tracking-tight">
                Serie Libertad <span class="text-yellow-500">Oro</span>
            </h2>
            <div class="mt-3 h-1 w-24 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full shadow-lg"></div>
        </div>

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-lg overflow-hidden border border-gray-200 sm:rounded-2xl">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-yellow-100 to-yellow-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Oro</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Acabado</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Diámetro (mm)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Ley</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($gliberty as $coin)
                                <tr class="hover:bg-yellow-50 transition">
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

    {{-- Sección: Información de la Serie Centenario Oro --}}
    <div id="oro" class="flex flex-col w-full max-w-6xl mx-auto mt-12">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#1C3144] tracking-tight">
                Serie Centenario <span class="text-yellow-500">Oro</span>
            </h2>
            <div class="mt-3 h-1 w-24 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full shadow-lg"></div>
        </div>

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-lg overflow-hidden border border-gray-200 sm:rounded-2xl">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-yellow-100 to-yellow-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Oro</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Acabado</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Diámetro (mm)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Peso (Oz)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Ley</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($gcenty as $coin)
                                <tr class="hover:bg-yellow-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $coin['name'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Satín</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coin['diameter'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coin['weight'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">.900</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección: Comprar productos --}}
    <div class="w-9/12 mt-20 mx-auto overflow-hidden sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#1C3144] tracking-tight">
                Comprar <span class="text-yellow-500">Productos</span>
            </h2>
            <div class="mt-3 h-1 w-24 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full shadow-lg"></div>
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
</x-guest-layout>
