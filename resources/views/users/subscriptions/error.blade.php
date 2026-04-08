<x-basix.ubase>
    
    <div class="text-center relative z-10 transform transition-all duration-300 py-4">
        
        <div class="flex justify-center mb-6">
            <div class="bg-red-100 p-4 rounded-full">
                <svg class="w-14 h-14 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold text-gray-900 mb-3 tracking-tight">¡Ups! Algo salió mal</h1>
        <p class="text-gray-500 mb-8 text-lg">No pudimos procesar tu pago para tu <span class="font-bold text-red-600">suscripción</span>. No se ha realizado ningún cargo.</p>

        {{-- <div class="bg-red-50 rounded-2xl p-5 mb-8 text-left border border-red-100 shadow-inner">
            <div class="flex justify-between mb-3">
                <span class="text-sm font-medium text-gray-600">Motivo del rechazo:</span>
                <span class="text-sm font-bold text-red-800 text-right w-1/2">{{ $errorMessage }}</span>
            </div>
            <div class="flex justify-between border-t border-red-200 pt-3 mt-1">
                <span class="text-sm font-medium text-gray-600">Monto a cobrar:</span>
                <span class="text-sm font-bold text-gray-800">${{ number_format($amount, 2) }} {{ $currency }}</span>
            </div>
        </div> --}}

        {{-- <div class="space-y-3">
            <a href="{{ route('checkout.index') }}" class="block w-full bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-bold text-lg py-4 px-4 rounded-xl transition duration-200 shadow-lg hover:shadow-red-500/30">
                Intentar con otra tarjeta
            </a>
            
            <a href="{{ route('support') }}" class="block w-full bg-white hover:bg-gray-50 text-gray-700 font-bold text-md py-3 px-4 rounded-xl border border-gray-200 transition duration-200 shadow-sm">
                Necesito ayuda con mi pago
            </a>
        </div> --}}
    </div>

</x-basix.ubase>