<section class="bg-gray-50 p-3 sm:p-5">
    <div class="mx-auto px-4 lg:px-12 lg:h-full">
        <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="flex items-center justify-center border border-stone-500 hover:bg-cyan-700 hover:text-white text-stone-900 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Nuevo producto
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">NOMBRE</th>
                            <th scope="col" class="px-4 py-3">CATEGORÍA</th>
                            <th scope="col" class="px-4 py-3">PRECIO</th>
                            <th scope="col" class="px-4 py-3">STOCK</th>
                            <th scope="col" class="px-4 py-3">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr class="border-b">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $p->name }}</th>
                            <td class="px-4 py-3">{{ $categories[$p->category_id-1]->name }}</td>
                            <td class="px-4 py-3">{{ $p->price }}</td>
                            <td class="px-4 py-3">{{ $p->stock }}</td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $p->id }}-dropdown-button" data-dropdown-toggle="{{ $p->id }}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $p->id }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="apple-imac-27-dropdown-button">
                                        <li>
                                            <a href="{{ route('product.detail', ['id' => $p['id']]) }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Detalles</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin-products.edit', ['id' => $p['id']]) }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Editar</a>
                                        </li>
                                    </ul>
                                    <form class="py-1" method="POST" action="{{ url('/administracion/productos/' . $p->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <nav class="p-4" aria-label="Table navigation">
                {{ $products->links() }}
            </nav>
        </div>
    </div>
</section>