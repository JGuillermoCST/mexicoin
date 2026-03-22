@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        .pv-wrap       { font-family: 'DM Sans', sans-serif; display: flex; gap: 24px; align-items: flex-start; max-width: 900px; }
        .pv-thumbs     { display: flex; flex-direction: column; gap: 10px; flex-shrink: 0; }
        .pv-thumb      { width: 68px; height: 68px; border-radius: 10px; overflow: hidden; border: 2px solid #e2e8f0; cursor: pointer; transition: border-color .18s, box-shadow .18s; flex-shrink: 0; }
        .pv-thumb img  { width: 100%; height: 100%; object-fit: cover; display: block; }
        .pv-thumb.active, .pv-thumb:hover { border-color: #0f172a; box-shadow: 0 0 0 3px rgba(15,23,42,.1); }

        .pv-stage      { display: flex; gap: 16px; flex: 1; align-items: flex-start; }

        /* Imagen principal */
        .pv-main-wrap  { position: relative; flex: 1; }
        .pv-main-box   { position: relative; border-radius: 16px; overflow: hidden; background: #fff; border: 1px solid #e2e8f0; box-shadow: 0 4px 24px rgba(0,0,0,.06); aspect-ratio: 1/1; cursor: crosshair; }
        .pv-main-img   { width: 100%; height: 100%; object-fit: cover; display: block; user-select: none; -webkit-user-drag: none; }

        .pv-lens       { position: absolute; width: 120px; height: 120px; border: 2px solid rgba(15,23,42,.3); border-radius: 50%; background: rgba(255,255,255,.15); backdrop-filter: blur(1px); pointer-events: none; box-shadow: 0 2px 12px rgba(0,0,0,.15); display: none; }
        .pv-main-box:hover .pv-lens { display: block; }

        .pv-hint       { position: absolute; bottom: 12px; right: 12px; background: rgba(15,23,42,.7); color: #fff; font-size: 11px; font-weight: 500; padding: 5px 10px; border-radius: 20px; display: flex; align-items: center; gap: 5px; backdrop-filter: blur(4px); pointer-events: none; transition: opacity .2s; }
        .pv-main-box:hover .pv-hint { opacity: 0; }

        .pv-expand     { position: absolute; top: 12px; right: 12px; background: rgba(255,255,255,.9); border: 1px solid #e2e8f0; border-radius: 8px; padding: 6px; cursor: pointer; display: flex; align-items: center; backdrop-filter: blur(4px); box-shadow: 0 2px 8px rgba(0,0,0,.08); transition: background .18s; }
        .pv-expand:hover { background: #fff; }

        .pv-arrow      { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,.9); border: 1px solid #e2e8f0; border-radius: 50%; width: 36px; height: 36px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,.08); transition: background .18s, color .18s; }
        .pv-arrow:hover { background: #0f172a; color: #fff; }
        .pv-arrow:hover svg { stroke: #fff; }
        .pv-arrow.prev { left: 10px; }
        .pv-arrow.next { right: 10px; }

        .pv-dots       { display: flex; justify-content: center; gap: 6px; margin-top: 14px; }
        .pv-dot        { height: 6px; border-radius: 3px; border: none; background: #cbd5e1; cursor: pointer; padding: 0; transition: all .25s ease; }
        .pv-dot.active { background: #0f172a; }

        /* Panel zoom */
        .pv-zoom-panel { width: 280px; height: 280px; flex-shrink: 0; border-radius: 16px; overflow: hidden; border: 1px solid #e2e8f0; background: #f8f7f4; display: flex; align-items: center; justify-content: center; transition: border-color .2s, box-shadow .2s; position: relative; }
        .pv-zoom-panel.active { border-color: #0f172a; box-shadow: 0 8px 32px rgba(0,0,0,.12); }
        .pv-zoom-bg    { width: 100%; height: 100%; background-repeat: no-repeat; }
        .pv-zoom-empty { text-align: center; color: #94a3b8; }
        .pv-zoom-empty svg { display: block; margin: 0 auto 10px; }
        .pv-zoom-label { position: absolute; top: 10px; left: 10px; background: rgba(15,23,42,.7); color: #fff; font-size: 10px; font-weight: 600; letter-spacing: .08em; padding: 3px 9px; border-radius: 20px; text-transform: uppercase; display: none; }
        .pv-zoom-panel.active .pv-zoom-label { display: block; }

        /* Lightbox */
        .pv-lightbox   { position: fixed; inset: 0; background: rgba(0,0,0,.88); display: flex; align-items: center; justify-content: center; z-index: 9999; padding: 24px; opacity: 0; pointer-events: none; transition: opacity .2s ease; }
        .pv-lightbox.open { opacity: 1; pointer-events: all; }
        .pv-lightbox img { max-width: 80vw; max-height: 85vh; object-fit: contain; border-radius: 12px; box-shadow: 0 32px 80px rgba(0,0,0,.5); }
        .pv-lb-btn     { position: absolute; background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2); color: #fff; border-radius: 50%; width: 48px; height: 48px; cursor: pointer; font-size: 22px; display: flex; align-items: center; justify-content: center; transition: background .18s; }
        .pv-lb-btn:hover { background: rgba(255,255,255,.2); }
        .pv-lb-prev    { left: 24px; }
        .pv-lb-next    { right: 24px; }
        .pv-lb-close   { top: 20px; right: 20px; width: 40px; height: 40px; font-size: 18px; }
        .pv-lb-dots    { position: absolute; bottom: 24px; left: 50%; transform: translateX(-50%); display: flex; gap: 8px; }
        .pv-lb-dot     { height: 8px; border-radius: 4px; border: none; background: rgba(255,255,255,.3); cursor: pointer; padding: 0; transition: all .25s ease; }
        .pv-lb-dot.active { background: #fff; }

        @media (max-width: 1280px) {
            .pv-wrap    { flex-direction: column; }
            .pv-thumbs  { flex-direction: row; }
            .pv-stage   { flex-direction: column; }
            .pv-zoom-panel { width: 100%; height: 200px; }
        }
    </style>
@endpush

{{-- Serializar imágenes para JS --}}
@php $pvImages = json_encode($images); @endphp

<div class="pv-wrap" id="pv-root">
    {{-- Miniaturas --}}
    <div class="pv-thumbs" id="pv-thumbs">
        @foreach($images as $i => $img)
            <div class="pv-thumb {{ $i === 0 ? 'active' : '' }}"
                 data-index="{{ $i }}"
                 onclick="pvSetActive({{ $i }})">
                <img src="{{ $img['thumb'] }}" alt="{{ $img['alt'] }}" loading="lazy">
            </div>
        @endforeach
    </div>

    {{-- Stage --}}
    <div class="pv-stage">

        {{-- Imagen principal --}}
        <div class="pv-main-wrap">
            <div class="pv-main-box" id="pv-main-box"
                 onmousemove="pvOnMove(event)"
                 onmouseleave="pvOnLeave()">

                <img class="pv-main-img" id="pv-main-img"
                     src="{{ $images[0]['full'] }}"
                     alt="{{ $images[0]['alt'] }}"
                     draggable="false">

                <div class="pv-lens" id="pv-lens"></div>

                <div class="pv-hint">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35M11 8v6M8 11h6"/></svg>
                    Hover para zoom
                </div>

                <button class="pv-expand" onclick="pvOpenLightbox()" title="Ver en grande">
                    <svg width="14" height="14" fill="none" stroke="#0f172a" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                </button>

                <button class="pv-arrow prev" onclick="pvPrev()">
                    <svg width="14" height="14" fill="none" stroke="#0f172a" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button class="pv-arrow next" onclick="pvNext()">
                    <svg width="14" height="14" fill="none" stroke="#0f172a" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                </button>
            </div>

            {{-- Dots --}}
            <div class="pv-dots" id="pv-dots">
                @foreach($images as $i => $img)
                    <button class="pv-dot {{ $i === 0 ? 'active' : '' }}"
                            style="width: {{ $i === 0 ? '20px' : '6px' }}"
                            data-index="{{ $i }}"
                            onclick="pvSetActive({{ $i }})"></button>
                @endforeach
            </div>
        </div>

        {{-- Panel de zoom --}}
        {{-- <div class="pv-zoom-panel" id="pv-zoom-panel">
            <div class="pv-zoom-label">2.5× zoom</div>
            <div class="pv-zoom-bg" id="pv-zoom-bg" style="display:none;"></div>
            <div class="pv-zoom-empty" id="pv-zoom-empty">
                <svg width="36" height="36" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35M11 8v6M8 11h6"/>
                </svg>
                <span style="font-size:12px;">Pasa el cursor<br>sobre la imagen</span>
            </div>
        </div> --}}
    </div>
</div>

{{-- Lightbox --}}
<div class="pv-lightbox" id="pv-lightbox" onclick="pvCloseLightbox()">
    <button class="pv-lb-btn pv-lb-prev" onclick="event.stopPropagation(); pvPrev()">&#8249;</button>
    <img id="pv-lb-img" src="{{ $images[0]['full'] }}" alt="" onclick="event.stopPropagation()">
    <button class="pv-lb-btn pv-lb-next" onclick="event.stopPropagation(); pvNext()">&#8250;</button>
    <button class="pv-lb-btn pv-lb-close" onclick="pvCloseLightbox()">&#215;</button>
    <div class="pv-lb-dots" id="pv-lb-dots">
        @foreach($images as $i => $img)
            <button class="pv-lb-dot {{ $i === 0 ? 'active' : '' }}"
                    style="width: {{ $i === 0 ? '24px' : '8px' }}"
                    data-index="{{ $i }}"
                    onclick="event.stopPropagation(); pvSetActive({{ $i }})"></button>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        (function () {
            const IMAGES      = @json($images);
            const ZOOM        = 2.5;
            const LENS_SIZE   = 120;
            let   active      = 0;

            const mainImg     = document.getElementById('pv-main-img');
            const mainBox     = document.getElementById('pv-main-box');
            const lens        = document.getElementById('pv-lens');
            const zoomPanel   = document.getElementById('pv-zoom-panel');
            const zoomBg      = document.getElementById('pv-zoom-bg');
            const zoomEmpty   = document.getElementById('pv-zoom-empty');
            const lbImg       = document.getElementById('pv-lb-img');
            const lightbox    = document.getElementById('pv-lightbox');

            /* ── Cambiar imagen activa ── */
            window.pvSetActive = function (i) {
                active = i;

                mainImg.src  = IMAGES[i].full;
                mainImg.alt  = IMAGES[i].alt;
                lbImg.src    = IMAGES[i].full;

                /* Thumbnails */
                document.querySelectorAll('.pv-thumb').forEach(function (el) {
                    el.classList.toggle('active', +el.dataset.index === i);
                });

                /* Dots principales */
                document.querySelectorAll('#pv-dots .pv-dot').forEach(function (el) {
                    const isActive = +el.dataset.index === i;
                    el.classList.toggle('active', isActive);
                    el.style.width = isActive ? '20px' : '6px';
                });

                /* Dots lightbox */
                document.querySelectorAll('#pv-lb-dots .pv-lb-dot').forEach(function (el) {
                    const isActive = +el.dataset.index === i;
                    el.classList.toggle('active', isActive);
                    el.style.width = isActive ? '24px' : '8px';
                });

                /* Resetear zoom bg */
                zoomBg.style.backgroundImage = 'url(' + IMAGES[i].full + ')';
            };

            window.pvPrev = function () { pvSetActive((active - 1 + IMAGES.length) % IMAGES.length); };
            window.pvNext = function () { pvSetActive((active + 1) % IMAGES.length); };

            /* ── Zoom ── */
            window.pvOnMove = function (e) {
                const rect = mainBox.getBoundingClientRect();
                const x    = e.clientX - rect.left;
                const y    = e.clientY - rect.top;
                const w    = rect.width;
                const h    = rect.height;

                /* Posición del lente (limitado a bordes) */
                const lx   = Math.min(Math.max(x - LENS_SIZE / 2, 0), w - LENS_SIZE);
                const ly   = Math.min(Math.max(y - LENS_SIZE / 2, 0), h - LENS_SIZE);
                lens.style.left    = lx + 'px';
                lens.style.top     = ly + 'px';
                lens.style.display = 'block';

                /* Posición del background en el panel */
                const px   = (x / w) * 100;
                const py   = (y / h) * 100;
                zoomBg.style.backgroundImage    = 'url(' + IMAGES[active].full + ')';
                zoomBg.style.backgroundSize     = (ZOOM * 100) + '%';
                zoomBg.style.backgroundPosition = px + '% ' + py + '%';
                zoomBg.style.display            = 'block';
                zoomEmpty.style.display         = 'none';
                zoomPanel.classList.add('active');
            };

            window.pvOnLeave = function () {
                lens.style.display      = 'none';
                zoomBg.style.display    = 'none';
                zoomEmpty.style.display = 'block';
                zoomPanel.classList.remove('active');
            };

            /* ── Lightbox ── */
            window.pvOpenLightbox  = function () { lightbox.classList.add('open'); };
            window.pvCloseLightbox = function () { lightbox.classList.remove('open'); };

            /* ── Swipe (imagen principal y lightbox) ── */
            function pvInitSwipe(el, onLeft, onRight) {
                var startX = null;
                var startY = null;
                var THRESHOLD = 40; /* px mínimos para considerar swipe */

                el.addEventListener('touchstart', function (e) {
                    startX = e.touches[0].clientX;
                    startY = e.touches[0].clientY;
                }, { passive: true });

                el.addEventListener('touchend', function (e) {
                    if (startX === null) return;
                    var dx = e.changedTouches[0].clientX - startX;
                    var dy = e.changedTouches[0].clientY - startY;

                    /* Solo actuar si el movimiento fue más horizontal que vertical */
                    if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > THRESHOLD) {
                        if (dx < 0) onLeft();   /* swipe izquierda → siguiente */
                        else        onRight();  /* swipe derecha  → anterior  */
                    }
                    startX = null;
                    startY = null;
                }, { passive: true });
            }

            /* Swipe en imagen principal */
            pvInitSwipe(mainBox, function () { pvNext(); }, function () { pvPrev(); });

            /* Swipe en lightbox */
            pvInitSwipe(lightbox, function () { pvNext(); }, function () { pvPrev(); });

            /* Teclado */
            document.addEventListener('keydown', function (e) {
                if (!lightbox.classList.contains('open')) return;
                if (e.key === 'ArrowLeft')  pvPrev();
                if (e.key === 'ArrowRight') pvNext();
                if (e.key === 'Escape')     pvCloseLightbox();
            });
        })();
    </script>
@endpush
    