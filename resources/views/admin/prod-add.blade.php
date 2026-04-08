{{-- Add product modal --}}
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm transition-opacity">
    <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl max-h-[92vh] overflow-hidden flex flex-col">
        
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 shrink-0">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-0.5">Catálogo</p>
                <h3 class="text-lg font-semibold text-slate-800">
                    Agregar producto nuevo
                </h3>
            </div>
            <button type="button" class="w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition cursor-pointer" data-modal-toggle="crud-modal">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span class="sr-only">Cerrar modal</span>
            </button>
        </div>

        <div class="overflow-y-auto p-6">
            <form method="POST" action="{{ route('admin-products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                    
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Nombre <span class="text-red-400">*</span></label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" placeholder="Escribe el nombre del producto" required="">
                    </div>

                    <div class="sm:col-span-1">
                        <label for="price" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Precio (MXN) <span class="text-red-400">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">$</span>
                            <input type="number" name="price" id="price" step="0.01" class="w-full pl-7 pr-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" placeholder="2999" required="">
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="price-base" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Base</label>
                        <select id="price-base" class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition cursor-pointer">
                            <option selected value="13">Seleccionar</option>
                            <option value="0">Oro</option>
                            <option value="1">Plata</option>
                        </select>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="price-mul" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Multiplicador <span class="text-red-400">*</span></label>
                        <input type="text" id="price-mul" name="multiplier" class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" placeholder="1.13" required="">
                    </div>

                    <div class="sm:col-span-1">
                        <label for="category" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Categoría <span class="text-red-400">*</span></label>
                        <select id="category" name="category" class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition cursor-pointer">
                            <option value="sel">Seleccionar</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Descripción</label>
                        <textarea id="description" name="description" rows="3" class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition resize-none" placeholder="Escribe la descripción del producto aquí"></textarea>  
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5" for="image">Imagen principal</label>
                        <input id="image" name="image" type="file" class="w-full text-sm text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-slate-100 file:text-slate-700 file:font-medium file:cursor-pointer hover:file:bg-slate-200 transition border border-slate-300 rounded-lg bg-white">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5" for="images">Imágenes de apoyo (máximo 4)</label>
                        <input id="images" name="images[]" type="file" multiple max="4" class="w-full text-sm text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-slate-100 file:text-slate-700 file:font-medium file:cursor-pointer hover:file:bg-slate-200 transition border border-slate-300 rounded-lg bg-white">
                    </div>

                    <div class="sm:col-span-1">
                        <label for="stock" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Stock <span class="text-red-400">*</span></label>
                        <input type="number" name="stock" id="stock" class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" placeholder="13" required="">
                    </div>

                    <input type="hidden" name="coin_base" id="coin-base" value="0.0">
                    <input type="hidden" name="coin_base_type" id="coin-base-type" value="other">
                </div>
                    
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition cursor-pointer" data-modal-toggle="crud-modal">
                        Cancelar
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition cursor-pointer shadow-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Añadir producto
                    </button>
                </div>
            </form>
        </div>
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
            } else {
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