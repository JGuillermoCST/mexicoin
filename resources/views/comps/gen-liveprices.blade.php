@push('styles')
<style>
    /* Carrusel base */
    .carousel {
        margin: 0 auto;
        padding: 20px 0;
        overflow: hidden;
    }

    .group {
        display: flex;
        gap: 20px;
        padding-right: 20px;
        will-change: transform;
        animation: scrolling 25s linear infinite;
    }

    .card {
        flex: 0 0 100%;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        backdrop-filter: blur(4px);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.03);
    }

    /* Colores refinados */
    .card:nth-child(1) {
        background: linear-gradient(135deg, #F5E14B, #E4C700);
        color: #1a1a1a;
    }
    .card:nth-child(2) {
        background: linear-gradient(135deg, #4E4E50, #2E2E2F);
        color: #f1f1f1;
    }

    .animate-marquee {
        animation: marquee 25s linear infinite;
        display: flex;
        white-space: nowrap;
    }

    @keyframes scrolling {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }

    /* Oscurecer o aclarar dinámicamente */
    @media (prefers-color-scheme: dark) {
        .card:nth-child(2) {
            background: linear-gradient(135deg, #3b3b3b, #1d1d1d);
            color: #f8f8f8;
        }
    }
</style>
@endpush

{{-- Live precios S --}}
<div class="flex md:hidden carousel w-full mx-0">    
    <div class="group">
        @foreach ($precios as $moneda)
            <div class="card h-fit w-full p-3 text-sm justify-center text-center">
                <span class="font-semibold uppercase tracking-wide">{{ $moneda['nombre'] }}</span> <br>
                Compra: <strong>{{ $moneda['compra'] }}</strong> <br>
                Venta: <strong>{{ $moneda['venta'] }}</strong>
            </div>
        @endforeach
    </div>
    <div aria-hidden class="group">
        @foreach ($precios as $moneda)
            <div class="card h-fit w-full p-3 text-sm justify-center text-center">
                <span class="font-semibold uppercase tracking-wide">{{ $moneda['nombre'] }}</span> <br>
                Compra: <strong>{{ $moneda['compra'] }}</strong> <br>
                Venta: <strong>{{ $moneda['venta'] }}</strong>
            </div>
        @endforeach
    </div>
</div>

{{-- Live precios M-L-XL --}}
<div class="hidden md:flex carousel w-full mx-0">    
    <div class="group">
        @foreach ($precios as $moneda)
            <div class="card h-fit w-10/12 p-4 text-xl xl:text-2xl justify-center text-center">
                <span class="font-semibold uppercase tracking-wide">{{ $moneda['nombre'] }}</span> — 
                Compra: <strong>{{ $moneda['compra'] }}</strong> 
                <br class="lg:hidden">
                Venta: <strong>{{ $moneda['venta'] }}</strong>
            </div>
        @endforeach
    </div>
    <div aria-hidden class="group">
        @foreach ($precios as $moneda)
            <div class="card h-fit w-10/12 p-4 text-xl xl:text-2xl justify-center text-center">
                <span class="font-semibold uppercase tracking-wide">{{ $moneda['nombre'] }}</span> — 
                Compra: <strong>{{ $moneda['compra'] }}</strong> 
                <br class="lg:hidden">
                Venta: <strong>{{ $moneda['venta'] }}</strong>
            </div>
        @endforeach
    </div>
</div>
