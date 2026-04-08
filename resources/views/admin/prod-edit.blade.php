<x-basix.ubase>
    <div class="max-w-5xl mx-auto py-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden relative">
            
            <div class="bg-gray-50 border-b border-gray-100 px-6 py-5 flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Editar Producto
                </h3>
            </div>

            <form class="p-6 md:p-8" method="POST" action="{{ route('admin-products.update', ['id' => $product['id']]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid gap-6 mb-8 grid-cols-1 md:grid-cols-2">
                    
                    <div class="col-span-1 md:col-span-2">
                        <label for="name" class="block mb-1.5 text-sm font-semibold text-gray-700">Nombre del producto</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 shadow-sm transition duration-150 ease-in-out" placeholder="Ej. Centenario de Oro" required>
                    </div>

                    <div class="col-span-1">
                        <label for="price" class="block mb-1.5 text-sm font-semibold text-gray-700">Precio (MXN)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="price" id="price" value="{{ $product->price }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-8 p-3 shadow-sm transition duration-150 ease-in-out" placeholder="2999" required step="any">
                        </div>
                    </div>

                    <div class="col-span-1">
                        <label for="price-base" class="block mb-1.5 text-sm font-semibold text-gray-700">Base de Cotización</label>
                        <select id="price-base" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 shadow-sm transition duration-150 ease-in-out cursor-pointer">
                            <option value="13" @if(!in_array($product->coin_base_type, ['gold', 'silver'])) selected @endif>Seleccionar / Otro</option>
                            <option value="0" @if ($product->coin_base_type == 'gold') selected @endif>Oro</option>
                            <option value="1" @if ($product->coin_base_type == 'silver') selected @endif>Plata</option>
                        </select>
                    </div>

                    <div class="col-span-1">
                        <label for="price-mul" class="block mb-1.5 text-sm font-semibold text-gray-700">Multiplicador</label>
                        <input type="text" id="price-mul" name="multiplier" value="{{ $product->multiplier }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 shadow-sm transition duration-150 ease-in-out" placeholder="Ej. 1.13" required>
                    </div>

                    <div class="col-span-1">
                        <label for="category" class="block mb-1.5 text-sm font-semibold text-gray-700">Categoría</label>
                        <select id="category" name="category" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 shadow-sm transition duration-150 ease-in-out cursor-pointer">
                            <option value="sel">Seleccionar categoría...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="description" class="block mb-1.5 text-sm font-semibold text-gray-700">Descripción</label>
                        <textarea id="description" name="description" rows="4" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 shadow-sm transition duration-150 ease-in-out resize-y" placeholder="Escribe los detalles del producto aquí...">{{ $product->description }}</textarea>  
                    </div>

                    <div class="col-span-1 md:col-span-2 border-t border-gray-100 pt-4 mt-2">
                        <h4 class="text-sm font-bold text-gray-800 mb-4">Archivos multimedia</h4>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block mb-1.5 text-sm font-semibold text-gray-700" for="image">Imagen principal <span class="text-xs font-normal text-gray-500">(Actual: {{ $product->image }})</span></label>
                        <input id="image" name="image" type="file" class="block w-full text-sm text-gray-600 border border-gray-300 rounded-xl cursor-pointer bg-white focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition duration-150 ease-in-out shadow-sm">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block mb-1.5 text-sm font-semibold text-gray-700" for="images">Imágenes de apoyo <span class="text-xs font-normal text-gray-500">(Máximo 4 archivos)</span></label>
                        <input id="images" name="images[]" type="file" multiple max="4" class="block w-full text-sm text-gray-600 border border-gray-300 rounded-xl cursor-pointer bg-white focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition duration-150 ease-in-out shadow-sm">
                    </div>

                    <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6 items-center bg-gray-50 p-5 rounded-2xl border border-gray-100 mt-2">
                        <div>
                            <label for="stock" class="block mb-1.5 text-sm font-semibold text-gray-700">Stock disponible</label>
                            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 shadow-sm transition duration-150 ease-in-out" placeholder="13" required>
                        </div>

                        <div class="flex items-center md:justify-end pt-5 md:pt-0">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="featured" name="featured" class="sr-only peer" @if ($product->is_featured) checked @endif>
                                <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                <span class="ml-3 text-sm font-semibold text-gray-800 select-none">Destacar producto en la tienda</span>
                            </label>
                        </div>
                    </div>

                    <input type="hidden" name="coin_base" id="coin-base" value="{{ $product->coin_base }}">
                    <input type="hidden" name="coin_base_type" id="coin-base-type" value="{{ $product->coin_base_type }}">
                </div>
                    
                <div class="flex justify-end border-t border-gray-100 pt-6">
                    <a href="{{ url()->previous() }}" class="text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-xl text-sm px-6 py-3 text-center mr-3 transition duration-200">
                        Cancelar
                    </a>
                    <button type="submit" class="text-white inline-flex items-center bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-xl text-sm px-6 py-3 text-center shadow-md hover:shadow-lg transition duration-200">
                        <svg class="me-2 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const myInput = document.getElementById('price-base');
        const myLabel = document.getElementById('price');
        const myMul = document.getElementById('price-mul');
        const myBaseType = document.getElementById('coin-base-type');
        const myBase = document.getElementById('coin-base');
        var myPrice = 0.0;
        const prices = @json($prices);

        myLabel.addEventListener('change', function() {
            if (myInput.value === '13') {
                myPrice = myLabel.value;
                console.log('Value:', myLabel.value);
                myBase.value = 0.0;
                myBaseType.value = 'other';
            } 
        });

        myInput.addEventListener('change', function() {
            if (myInput.value === '13') {
                myPrice = myLabel.value;
                console.log('Value:', myLabel.value);
                myBase.value = 0.0;
                myBaseType.value = 'other';
            } 

            if (myInput.value === '0') {
                var value = Number(prices[0]['venta'].slice(1).replace(",", ""));
                myLabel.value = value;
                myBase.value = value;
                myBaseType.value = 'gold';
                console.log(value);
            } else {
                if (prices[myInput.value]['venta'].includes(",")) {
                    myLabel.value = Number(prices[myInput.value]['venta'].slice(1).replace(",", ""));
                }else {
                    myLabel.value = Number(prices[myInput.value]['venta'].slice(1));
                }
                myBase.value = myLabel.value;
                myBaseType.value = 'silver';
                console.log('Selected value:', myInput.value);
            }

            myMul.value = '1.0'; 
            myPrice = myLabel.value;
            console.log('Updated price:', myPrice);
        });

        myMul.addEventListener('change', function() {
            if (myMul.value === '1.0') {
                myLabel.value = myPrice;
            } else {
                myLabel.value = (myPrice * Number(myMul.value)).toFixed(2);
            }
        });
    </script>
</x-basix.ubase>