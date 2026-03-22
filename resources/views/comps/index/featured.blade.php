<!-- features -->
    <div class="">
        <div class="grid grid-cols-1 gap-3 mx-auto justify-center">
            <a href="{{ route('subs') }}" class="border border-emerald-700 rounded-sm px-1 py-3 flex justify-center items-center gap-3">
                <img src="{{ asset('assets/delivery-van.svg') }}" alt="Delivery" class="w-6 h-6 lg:w-8 lg:h-8 xl:w-12 xl:h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-base lg:text-lg xl:text-xl">Envío gratuito</h4>
                    <p class="text-gray-500 text-xs lg:text-base xl:text-lg">Con membresía plus</p>
                </div>
            </a>
            <a href="{{ route('returns-pol') }}" class="border border-emerald-700 rounded-sm px-1 py-3 flex justify-center items-center gap-3">
                <img src="{{ asset('assets/money-back.svg') }}" alt="Delivery" class="w-6 h-6 lg:w-8 lg:h-8 xl:w-12 xl:h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-base lg:text-lg xl:text-xl">Devoluciones en 7 días</h4>
                    <p class="text-gray-500 text-xs lg:text-base xl:text-lg">Recuperada la pieza</p>
                </div>
            </a>
            <a href="{{ route('subs') }}" class="border border-emerald-700 rounded-sm px-1 py-3 flex justify-center items-center gap-3">
                <img src="{{ asset('assets/service-hours.svg') }}" alt="Delivery" class="w-6 h-6 lg:w-8 lg:h-8 xl:w-12 xl:h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-base lg:text-lg xl:text-xl">Soporte 24/7</h4>
                    <p class="text-gray-500 text-xs lg:text-base xl:text-lg">Para nuestros clientes en plan pro</p>
                </div>
            </a>
        </div>
    </div>
    <!-- ./features -->