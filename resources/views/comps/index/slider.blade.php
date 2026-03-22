{{--
|--------------------------------------------------------------------------
| Slider de productos destacados — Auto-play
|--------------------------------------------------------------------------
| - Sin flechas ni botones de control
| - Dots visuales (no interactivos) para indicar posición
| - Se pausa al hacer hover (el usuario puede leer la tarjeta)
| - Swipe táctil en móvil
| - 1 tarjeta en móvil / 2 en tablet / 3 en desktop
| - Toda la tarjeta es un enlace al detalle del producto
--}}

@php
    $starPath = "M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z";
@endphp

<div
    id="pslider"
    class="relative w-11/12 xl:w-7/12 mx-auto select-none"
    data-total="{{ count($featured) }}"
>
    {{-- ── Track ── --}}
    <div class="overflow-hidden rounded-2xl">
        <div
            id="pslider-track"
            class="flex transition-transform duration-500 ease-in-out"
        >
            @foreach($featured as $producto)
                <div class="w-full flex-shrink-0 md:w-1/2 lg:w-1/3 px-2">

                    {{-- Tarjeta completa como enlace --}}
                    <a
                        href="{{ route('product.detail', ['id' => $producto['id']]) }}"
                        class="group block bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300"
                    >
                        {{-- Imagen --}}

                        <div class="overflow-hidden h-full">
                            <img
                                src="{{ asset('assets/products/mains/' . $producto['image']) }}"
                                alt="{{ $producto['name'] }}"
                                class="w-full h-56 sm:h-60 lg:h-54 object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                        </div>



                        {{-- Contenido --}}
                        <div class="px-5 py-4 flex flex-col gap-3">

                            {{-- Nombre --}}
                            <h5 class="text-base sm:text-lg font-semibold text-gray-900 leading-snug line-clamp-2 group-hover:text-indigo-600 transition-colors">
                                {{ $producto['name'] }}
                            </h5>

                            {{-- Estrellas --}}
                            <div class="flex items-center gap-1.5">
                                <div class="flex items-center gap-0.5">
                                    @for($s = 1; $s <= 5; $s++)
                                        <svg class="w-3.5 h-3.5 {{ $s <= 4 ? 'text-yellow-400' : 'text-gray-200' }}"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="{{ $starPath }}"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-xs font-semibold text-blue-700 bg-blue-100 px-2 py-0.5 rounded">5.0</span>
                            </div>

                            {{-- Precio + CTA --}}
                            <div class="flex items-center justify-between mt-1">
                                <span class="text-xl font-bold text-gray-900">${{ $producto['price'] }}</span>
                                {{-- <span class="inline-flex items-center gap-1.5 rounded-full py-2 px-4 text-sm font-semibold text-white bg-indigo-600 group-hover:bg-indigo-700 transition-colors">
                                    Comprar
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6"/>
                                    </svg>
                                </span> --}}
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ── Dots (solo visuales) ── --}}
    <div id="pslider-dots" class="flex justify-center gap-2 mt-5"></div>
</div>

@push('scripts')
<script>
(function () {
    var slider   = document.getElementById('pslider');
    var track    = document.getElementById('pslider-track');
    var dotsWrap = document.getElementById('pslider-dots');
    var total    = parseInt(slider.dataset.total, 10);

    var current   = 0;
    var perSlide  = 1;
    var autoTimer = null;
    var INTERVAL  = 3500; /* ms entre avances */

    function getPerSlide() {
        var w = window.innerWidth;
        if (w >= 1024) return 3;
        if (w >= 768)  return 2;
        return 1;
    }

    function totalSlides() {
        return Math.ceil(total / perSlide);
    }

    /* ── Dots visuales ── */
    function renderDots() {
        dotsWrap.innerHTML = '';
        var n = totalSlides();
        for (var i = 0; i < n; i++) {
            var d = document.createElement('span');
            d.className = 'block h-1.5 rounded-full transition-all duration-300 ' +
                (i === current ? 'w-5 bg-indigo-600' : 'w-1.5 bg-gray-300');
            dotsWrap.appendChild(d);
        }
    }

    /* ── Ir a un slide ── */
    function goTo(index) {
        var n = totalSlides();
        current = (index + n) % n;
        var pct = (current * perSlide * 100) / total;
        track.style.transform = 'translateX(-' + pct + '%)';
        renderDots();
    }

    /* ── Auto-play ── */
    function startAuto() {
        clearInterval(autoTimer);
        autoTimer = setInterval(function () { goTo(current + 1); }, INTERVAL);
    }

    /* ── Pausar en hover ── */
    slider.addEventListener('mouseenter', function () { clearInterval(autoTimer); });
    slider.addEventListener('mouseleave', startAuto);

    /* ── Swipe táctil ── */
    var touchStartX = null;
    track.addEventListener('touchstart', function (e) {
        touchStartX = e.touches[0].clientX;
        clearInterval(autoTimer); /* pausar mientras se arrastra */
    }, { passive: true });
    track.addEventListener('touchend', function (e) {
        if (touchStartX === null) return;
        var dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 40) dx < 0 ? goTo(current + 1) : goTo(current - 1);
        touchStartX = null;
        startAuto();
    }, { passive: true });

    /* ── Resize ── */
    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            var newPer = getPerSlide();
            if (newPer !== perSlide) {
                perSlide = newPer;
                if (current >= totalSlides()) current = 0;
                goTo(current);
            }
        }, 150);
    });

    /* ── Init ── */
    perSlide = getPerSlide();
    goTo(0);
    startAuto();
})();
</script>
@endpush