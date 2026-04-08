<x-basix.ubase>
    
    <div class="w-10/12 md:w-7/12 lg:w-5/12 mx-auto mt-24 text-center z-10 transform transition-all hover:scale-[1.02] duration-300 py-4 bg-white rounded-2xl shadow-lg p-6 py-12">
        
        <div class="flex justify-center mb-6">
            <div class="bg-green-100 p-4 rounded-full animate-bounce">
                <svg class="w-14 h-14 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold text-gray-900 mb-3 tracking-tight">¡Suscripción Exitosa!</h1>
        <p class="text-gray-500 mb-8 text-lg">Bienvenido a la experiencia <span class="font-bold text-indigo-600">
            @if (auth()->user()->subscription->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnR5RBqlwskPfVY8CNlG6h')
                Plus
            @elseif (auth()->user()->subscription->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnRiRBqlwskPfV3gTwIQfS')
                Pro
            @endif
        </span>. Tu cuenta ha sido actualizada.</p>

        <div class="bg-gray-50 rounded-2xl p-5 mb-8 text-left border border-gray-100 shadow-inner">
            <div class="flex justify-between mb-3">
                <span class="text-sm font-medium text-gray-500">Plan adquirido:</span>
                <span class="text-sm font-bold text-gray-800">
                    @if (auth()->user()->subscription->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnR5RBqlwskPfVY8CNlG6h')
                        Plus
                    @elseif (auth()->user()->subscription->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnRiRBqlwskPfV3gTwIQfS')
                        Pro
                    @endif
                </span>
            </div>
            <div class="flex justify-between mb-3">
                <span class="text-sm font-medium text-gray-500">Total pagado:</span>
                <span class="text-sm font-bold text-gray-800">
                    @if (auth()->user()->subscription->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnR5RBqlwskPfVY8CNlG6h')
                        $499.00
                    @elseif (auth()->user()->subscription->isActive() && auth()->user()->subscription->stripe_price == 'price_1TDnRiRBqlwskPfV3gTwIQfS')
                        $999.00
                    @endif
                </span>
            </div>
            <div class="flex justify-between border-t border-gray-200 pt-3 mt-1">
                <span class="text-sm font-medium text-gray-500">Próxima renovación:</span>
                <span class="text-sm font-bold text-gray-800">{{ Auth::user()->subscription->next_billing_date->translatedFormat('j \d\e F, Y') }}</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="block w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-bold text-lg py-4 px-4 rounded-xl transition duration-200 shadow-lg hover:shadow-indigo-500/30">
            Ir a mi panel de control
        </a>
    </div>

    {{-- 
        Manejo del Script de Confeti:
        Si tu layout 'guest.blade.php' tiene un @stack('scripts') antes de cerrar el </body>, 
        puedes usar @push('scripts'). Si no, puedes dejarlo aquí mismo dentro del componente.
    --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const duration = 3 * 1000;
                const animationEnd = Date.now() + duration;
                const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

                function randomInRange(min, max) {
                    return Math.random() * (max - min) + min;
                }

                const interval = setInterval(function() {
                    const timeLeft = animationEnd - Date.now();

                    if (timeLeft <= 0) {
                        return clearInterval(interval);
                    }

                    const particleCount = 50 * (timeLeft / duration);
                    
                    confetti(Object.assign({}, defaults, { 
                        particleCount, 
                        origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } 
                    }));
                    confetti(Object.assign({}, defaults, { 
                        particleCount, 
                        origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } 
                    }));
                }, 250);
            });
        </script>
    @endpush
</x-basix.ubase>