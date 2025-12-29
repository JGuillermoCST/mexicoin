{{-- Add product modal --}}
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-6/12 max-h-full">
        <!-- Modal content -->
        <div class="relative border-t border-l-2 border-indio-oscuro/50 bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Agregar producto nuevo
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="{{ route('admin-products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Precio(MXN)</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="price-base" class="block mb-2 text-sm font-medium text-gray-900">Base</label>
                        <select id="price-base" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected value="13">Seleccionar</option>
                            <option value="0">Oro</option>
                            <option value="1">Plata</option>
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="price-mul" class="block mb-2 text-sm font-medium text-gray-900">Multiplicador</label>
                        <input type="text" id="price-mul" name="multiplier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                    </div>


                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Categoría</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="sel">Seleccionar</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>  
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Imagen principal</label>
                        <input id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="single_image" type="file" single>
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Imágenes de apoyo (máximo 4)</label>
                        <input id="images" name="images[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="multiple_files" type="file" multiple max="4">
                    </div>

                    <div class="col-span-2">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                        <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="13" required="">
                    </div>

                    <input type="hidden" name="coin_base" id="coin-base" value="0.0">
                    <input type="hidden" name="coin_base_type" id="coin-base-type" value="other">
                </div>
                    
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Añadir producto
                </button>
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

    // document.addEventListener('DOMContentLoaded', function() {
    //     // Set the initial value of the label based on the default selected option
    //     var value = Number(prices[0]['venta'].slice(1).replace(",", ""));
    //     //myLabel.value = value;
    //     myPrice = value;
    //     console.log(value);
    // });

    myLabel.addEventListener('change', function() {
        // Update the input's value with the label's current text content
        if (myInput.value === '13') {
            myPrice = myLabel.value;
            console.log('Value:', myLabel.value);
            myBase.value = 0.0;
            myBaseType.value = 'other';
        } 
    });

    myInput.addEventListener('change', function() {
        // Update the label's text content with the input's current value

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

        

        myMul.value = '1.0'; // Reset multiplier to default
        myPrice = myLabel.value;
        console.log('Updated price:', myPrice);
    });

    myMul.addEventListener('change', function() {
        // Update the label's text content with the input's current value
        if (myMul.value === '1.0') {
            myLabel.value = myPrice;
        } else {
            myLabel.value = (myPrice * Number(myMul.value)).toFixed(2);
        }
    });
</script>
