<x-basix.ubase>

@props([
    'user' => [
        'name'          => Auth::user()->name . ' ' . Auth::user()->last_name,
        'email'         => Auth::user()->email,
        'start_date'    => Auth::user()->subscription->created_at,
        'months_active' => Auth::user()->subscription->monthsActive(),
        'next_billing'  => Auth::user()->subscription->getNextBillingDateAttribute(),
    ]
])

@php
    $months         = (int) $user['months_active'];
    $totalMonths    = 3;
    $progress       = min(($months / $totalMonths) * 100, 100);
    $rewardUnlocked = $months >= $totalMonths;

    $milestones = [
        1 => ['label' => 'Mes 1', 'desc' => 'Tu viaje comienza'],
        2 => ['label' => 'Mes 2', 'desc' => 'Un paso más cerca'],
        3 => ['label' => 'Mes 3', 'desc' => 'Recompensa exclusiva pensada para ti'],
    ];

    $benefits = [
        ['icon' => '⚡', 'title' => 'Soporte prioritario 24/7',        'desc' => 'Respuesta prioritaria garantizada en menos de 2 horas'],
        ['icon' => '📊', 'title' => 'Promociones exclusivas',   'desc' => 'Los mejores descuentos y ofertas únicas'],
        ['icon' => '🔗', 'title' => 'Acceso anticipado a nuevas publicaciones', 'desc' => 'Accede a contenido inédito de libros y revistas al permanecer 3 meses consecutivos con el plan'],
        ['icon' => '🛡️', 'title' => 'Puntos dobles por tus compras',         'desc' => 'Duplica tus puntos con cada compra'],
        ['icon' => '🗂️', 'title' => 'Acceso anticipado a piezas raras/limitadas',  'desc' => 'Sé de los primeros en adquirir piezas únicas'],
        ['icon' => '👥', 'title' => 'Shoutout de tu marca en nuestra página',      'desc' => 'Permite que tu marca sea destacada en nuestra plataforma'],
    ];
@endphp

@push('styles')
    <style>
        @keyframes progress-fill {
            from { width: 0%; }
            to   { width: {{ $progress }}%; }
        }
        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position:  200% center; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px);  }
            50%       { transform: translateY(-7px); }
        }
        @keyframes glow-pulse {
            0%, 100% { box-shadow: 0 0 24px rgba(251,191,36,.25); }
            50%       { box-shadow: 0 0 48px rgba(251,191,36,.5), 0 0 96px rgba(251,191,36,.15); }
        }

        .pf-bar       { animation: progress-fill 1.4s cubic-bezier(.4,0,.2,1) forwards; }
        .shimmer-txt  {
            background: linear-gradient(90deg, #fde68a, #fbbf24, #f59e0b, #fbbf24, #fde68a);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s linear infinite;
        }
        .reward-glow  { animation: glow-pulse 2.5s ease-in-out infinite; }
        .float-el     { animation: float 3.2s ease-in-out infinite; }
    </style>
@endpush

<div class="min-h-screen bg-slate-950 text-slate-100" style="font-family:'DM Sans',sans-serif;">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Fraunces:ital,wght@0,600;0,700;1,500&display=swap" rel="stylesheet">

    {{-- ── NAV ── --}}
    <header class="border-b border-white/5 px-5 py-4">
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                {{-- <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white text-xs font-bold">F</div>
                <span class="font-semibold text-sm">FOLD</span> --}}
            </div>
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-xs font-medium text-slate-200">{{ $user['name'] }}</span>
                    <span class="text-xs text-slate-500">{{ $user['email'] }}</span>
                </div>
                <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-white text-sm font-bold">
                    {{ strtoupper(substr($user['name'], 0, 1)) }}
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-10 space-y-6">

        {{-- ── HERO ── --}}
        <div class="relative rounded-3xl overflow-hidden border border-blue-900/40 bg-linear-to-br from-blue-950 via-slate-900 to-slate-950 p-8 sm:p-10">
            <div class="absolute -top-24 -right-16 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-16 -left-10 w-56 h-56 bg-violet-600/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 bg-blue-600/20 border border-blue-500/30 rounded-full px-3 py-1 mb-4">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                        <span class="text-xs font-semibold text-blue-300 tracking-wider uppercase">Suscripción activa</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-1.5" style="font-family:'Fraunces',serif;">
                        Plan <em class="not-italic text-blue-400">Pro</em>
                    </h1>
                    <p class="text-slate-500 text-sm">
                        Miembro desde
                        <span class="text-slate-300">{{ \Carbon\Carbon::parse($user['start_date'])->translatedFormat('d \d\e F, Y') }}</span>
                    </p>
                </div>

                <div class="flex flex-col items-start sm:items-end gap-2 shrink-0">
                    <div class="text-3xl font-bold text-white" style="font-family:'Fraunces',serif;">
                        $999 <span class="text-base font-normal text-slate-500">MXN/mes</span>
                    </div>
                    <p class="text-xs text-slate-500">
                        @if (Auth::user()->subscription->isCancelled())
                            Renovación cancelada, tu suscripción expirará el {{ $user['next_billing'] }}.
                        @else
                            Próximo cobro: <span class="text-slate-300 font-medium">{{ $user['next_billing'] }}</span>
                        @endif
                    </p>
                    <div class="flex items-center gap-3 mt-1">
                        {{-- <a href="{{ route('main') }}"
                           class="text-xs text-emerald-400 hover:text-emerald-300 transition font-medium underline underline-offset-2">
                            Mejorar a Pro →
                        </a> --}}
                        <span class="text-slate-700">·</span>
                        @if (Auth::user()->subscription->isCancelled())
                            <a href="{{ route('cancel-subscription') }}" class="text-xs text-slate-600 hover:text-red-400 transition underline underline-offset-2 cursor-pointer bg-transparent border-none p-0">
                                Reactivar suscripción
                            </a>
                        @else
                            <button onclick="cancelModalOpen()" class="text-xs text-slate-600 hover:text-red-400 transition underline underline-offset-2 cursor-pointer bg-transparent border-none p-0">
                                Cancelar
                            </button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>

        {{-- ── PROGRESO ── --}}
        <div class="bg-slate-900 border border-white/5 rounded-3xl p-7 sm:p-8">
            <div class="flex flex-wrap items-start justify-between gap-3 mb-7">
                <div>
                    <h2 class="text-sm font-semibold text-slate-100">Tu progreso como miembro Pro</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        {{ $months }} de {{ $totalMonths }} meses completados
                    </p>
                </div>
                @if($rewardUnlocked)
                    <span class="inline-flex items-center gap-1.5 bg-amber-400/10 border border-amber-400/30 text-amber-300 text-xs font-semibold px-3 py-1.5 rounded-full">
                        🏆 Recompensa desbloqueada
                    </span>
                @else
                    <span class="text-xs text-slate-500 bg-slate-800 border border-slate-700 px-3 py-1.5 rounded-full">
                        {{ $totalMonths - $months }} {{ ($totalMonths - $months) === 1 ? 'mes' : 'meses' }} para tu recompensa
                    </span>
                @endif
            </div>

            {{-- Barra + dots --}}
            <div class="relative mb-8">
                {{-- Track --}}
                <div class="h-2.5 bg-slate-800 rounded-full overflow-hidden">
                    <div class="pf-bar h-full rounded-full {{ $rewardUnlocked
                        ? 'bg-linear-to-r from-amber-500 to-yellow-300'
                        : 'bg-linear-to-r from-blue-700 to-blue-400' }}"
                        style="width:0%;">
                    </div>
                </div>

                {{-- Milestone dots --}}
                @foreach($milestones as $m => $milestone)
                    @php
                        $pos     = ($m / $totalMonths) * 100;
                        $reached = $months >= $m;
                        $isLast  = $m === $totalMonths;
                    @endphp
                    <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 z-10" style="left:{{ $pos }}%">
                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center
                            {{ $reached
                                ? ($isLast ? 'bg-amber-400 border-amber-300' : 'bg-blue-500 border-blue-400')
                                : 'bg-slate-800 border-slate-600' }}">
                            @if($reached)
                                @if($isLast)
                                    <span class="text-slate-900 text-xs leading-none">★</span>
                                @else
                                    <svg width="8" height="8" fill="none" stroke="white" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Etiquetas milestone --}}
            <div class="grid grid-cols-3 gap-2 sm:gap-3">
                @foreach($milestones as $m => $milestone)
                    @php
                        $reached = $months >= $m;
                        $isLast  = $m === $totalMonths;
                    @endphp
                    <div class="flex flex-col items-center text-center px-3 py-4 rounded-2xl border transition-all
                        {{ $reached && $isLast  ? 'bg-amber-400/10 border-amber-400/30'
                         : ($reached            ? 'bg-blue-600/10 border-blue-500/20'
                         :                        'bg-slate-800/40 border-white/5') }}">
                        <span class="text-xl mb-2 leading-none">{{ $isLast ? '🏆' : ($reached ? '✅' : '⭕') }}</span>
                        <span class="text-xs font-semibold
                            {{ $reached && $isLast ? 'text-amber-300'
                             : ($reached           ? 'text-blue-300'
                             :                       'text-slate-500') }}">
                            {{ $milestone['label'] }}
                        </span>
                        <span class="text-xs mt-1
                            {{ $reached && $isLast ? 'text-amber-400/70'
                             : ($reached           ? 'text-slate-400'
                             :                       'text-slate-600') }}">
                            {{ $milestone['desc'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ── RECOMPENSA ── --}}
        @if($rewardUnlocked)
            {{-- Desbloqueada --}}
            <div class="reward-glow relative rounded-3xl overflow-hidden border border-amber-400/40 bg-linear-to-br from-amber-950/50 via-slate-900 to-slate-950 p-8">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(251,191,36,.08),transparent_60%)] pointer-events-none"></div>
                <div class="relative flex flex-col sm:flex-row items-start sm:items-center gap-6">
                    <div class="float-el text-6xl shrink-0 select-none">🏆</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold uppercase tracking-widest text-amber-400 mb-2">
                            Recompensa exclusiva · Mes 3
                        </p>
                        <h3 class="text-2xl font-bold text-white mb-2" style="font-family:'Fraunces',serif;">
                            <span class="shimmer-txt">Acceso Fundador Pro</span>
                        </h3>
                        <p class="text-sm text-slate-400 leading-relaxed">
                            Por ser miembro Pro durante 3 meses seguidos, accedes a funciones beta en primicia,
                            tu nombre en los créditos del producto y un
                            <strong class="text-amber-300 font-semibold">20% de descuento permanente</strong>
                            en cualquier upgrade futuro.
                        </p>
                    </div>
                    <button class="shrink-0 inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-300 active:scale-95 text-slate-900 font-bold text-sm px-6 py-3 rounded-xl transition-all hover:shadow-lg hover:shadow-amber-400/30">
                        Reclamar recompensa
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
            </div>
        @else
            {{-- Bloqueada (vista previa) --}}
            <div class="relative rounded-3xl overflow-hidden border border-white/5 bg-slate-900">
                {{-- Overlay blur --}}
                <div class="absolute inset-0 z-10 flex flex-col items-center justify-center bg-slate-950/70 backdrop-blur-[3px] rounded-3xl">
                    <div class="text-4xl mb-3 select-none">🔒</div>
                    <p class="text-sm font-semibold text-slate-200">Se desbloquea en el mes 3</p>
                    <p class="text-xs text-slate-500 mt-1">
                        Faltan <span class="text-amber-400 font-semibold">{{ $totalMonths - $months }}
                        {{ ($totalMonths - $months) === 1 ? 'mes' : 'meses' }}</span>
                    </p>
                </div>
                {{-- Contenido desenfocado --}}
                <div class="opacity-30 pointer-events-none p-8 flex items-center gap-6">
                    <div class="text-6xl select-none">🏆</div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-amber-400 mb-1">Recompensa exclusiva · Mes 3</p>
                        <h3 class="text-2xl font-bold text-white mb-2" style="font-family:'Fraunces',serif;">Acceso Fundador Pro</h3>
                        <p class="text-sm text-slate-400">Descuento permanente del 20% + acceso beta + créditos de fundador.</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- ── BENEFICIOS ── --}}
        <div>
            <h2 class="text-sm font-semibold text-slate-300 mb-4">Todo lo que incluye tu plan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($benefits as $benefit)
                    <div class="group bg-slate-900 hover:bg-slate-800/80 border border-white/5 hover:border-white/10 rounded-2xl p-5 transition-all duration-150 cursor-default">
                        <div class="text-2xl mb-3 select-none">{{ $benefit['icon'] }}</div>
                        <p class="text-sm font-semibold text-slate-100 mb-1">{{ $benefit['title'] }}</p>
                        <p class="text-xs text-slate-500 leading-relaxed">{{ $benefit['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ── ACCIONES RÁPIDAS ── --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pb-10">
            {{-- <a href="{{ route('main') }}"
               class="group flex items-center gap-4 bg-slate-900 hover:bg-slate-800 border border-white/5 hover:border-white/10 rounded-2xl p-5 transition-all">
                <div class="w-10 h-10 rounded-xl bg-slate-800 group-hover:bg-slate-700 flex items-center justify-center text-xl transition-colors shrink-0">🧾</div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-100">Mis facturas</p>
                    <p class="text-xs text-slate-500 truncate">Descarga tus comprobantes de pago</p>
                </div>
                <svg class="ml-auto text-slate-700 group-hover:text-slate-400 shrink-0 transition-colors" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
            </a>

            <a href="{{ route('main') }}"
               class="group flex items-center gap-4 bg-slate-900 hover:bg-slate-800 border border-white/5 hover:border-white/10 rounded-2xl p-5 transition-all">
                <div class="w-10 h-10 rounded-xl bg-slate-800 group-hover:bg-slate-700 flex items-center justify-center text-xl transition-colors shrink-0">💳</div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-100">Método de pago</p>
                    <p class="text-xs text-slate-500 truncate">Actualiza tu tarjeta o PayPal</p>
                </div>
                <svg class="ml-auto text-slate-700 group-hover:text-slate-400 shrink-0 transition-colors" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
            </a> --}}
        </div>

    </main>
</div>

{{-- ══════════════════════════════════════════
     MODAL DE CANCELACIÓN
══════════════════════════════════════════ --}}
<div id="cancel-modal" class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4 bg-black/70 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200">
    <div id="cancel-modal-box" class="relative w-full sm:max-w-md bg-slate-900 border border-white/10 sm:rounded-2xl rounded-t-2xl shadow-2xl translate-y-4 sm:translate-y-0 sm:scale-95 transition-all duration-200">

        <div class="flex justify-center pt-3 pb-1 sm:hidden">
            <div class="w-10 h-1 bg-slate-700 rounded-full"></div>
        </div>

        <div class="flex items-start justify-between px-6 pt-5 pb-4 border-b border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-base shrink-0">⚠️</div>
                <div>
                    <p class="text-sm font-semibold text-slate-100">Cancelar suscripción</p>
                    <p class="text-xs text-slate-500 mt-0.5">Esta acción no se puede deshacer</p>
                </div>
            </div>
            <button onclick="cancelModalClose()" class="w-7 h-7 flex items-center justify-center rounded-full text-slate-500 hover:bg-slate-800 hover:text-slate-300 transition cursor-pointer">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="px-6 py-5 space-y-4">
            {{-- <div class="bg-red-500/5 border border-red-500/20 rounded-xl p-4 space-y-2">
                <p class="text-xs font-semibold text-red-400 uppercase tracking-wider mb-2">Perderás acceso a:</p>
                @foreach($losses as $loss)
                    <div class="flex items-center gap-2">
                        <svg width="12" height="12" fill="none" stroke="#f87171" stroke-width="2.5" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
                        <span class="text-xs text-slate-400">{{ $loss }}</span>
                    </div>
                @endforeach
            </div> --}}

            <div class="flex items-start gap-3 bg-slate-800/60 border border-white/5 rounded-xl p-4">
                <svg class="shrink-0 mt-0.5 text-slate-400" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/></svg>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Seguirás teniendo acceso hasta el
                    <strong class="text-slate-200">{{ $user['next_billing']->translatedFormat('j \d\e F, Y') }}</strong>.
                    No se realizarán más cobros.
                </p>
            </div>

            <form id="cancel-form" method="POST" action="{{ route('main') }}">
                @csrf
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">
                    Escribe <span class="text-red-400 font-bold">CANCELAR</span> para confirmar
                </label>
                <input
                    id="cancel-confirm-input"
                    name="confirm"
                    type="text"
                    placeholder="CANCELAR"
                    oninput="cancelCheckInput(this)"
                    autocomplete="off"
                    class="w-full h-10 px-3 text-sm border border-slate-700 rounded-lg bg-slate-800 text-slate-100 placeholder-slate-600 outline-none focus:border-red-500/50 transition"
                >
                @error('confirm')
                    <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
                @enderror
            </form>
        </div>

        <div class="flex items-center justify-end gap-2 px-6 pb-6 pt-1">
            <button onclick="cancelModalClose()" class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-slate-200 bg-slate-800 hover:bg-slate-700 rounded-lg transition cursor-pointer">
                Mantener suscripción
            </button>
            <a href="{{ route('cancel-subscription') }}" id="cancel-submit-btn" disabled class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold rounded-lg transition-all bg-slate-700 text-slate-500 cursor-not-allowed opacity-50">
                Confirmar cancelación
            </a>
        </div>
    </div>
</div>

<script>
(function () {
    window.cancelModalOpen = function () {
        var modal = document.getElementById('cancel-modal');
        var box   = document.getElementById('cancel-modal-box');
        document.getElementById('cancel-confirm-input').value = '';
        cancelCheckInput(document.getElementById('cancel-confirm-input'));
        modal.classList.remove('opacity-0', 'pointer-events-none');
        requestAnimationFrame(function () {
            box.classList.remove('translate-y-4', 'sm:scale-95');
            box.classList.add('translate-y-0', 'sm:scale-100');
        });
        document.body.style.overflow = 'hidden';
    };

    window.cancelModalClose = function () {
        var modal = document.getElementById('cancel-modal');
        var box   = document.getElementById('cancel-modal-box');
        box.classList.add('translate-y-4', 'sm:scale-95');
        box.classList.remove('translate-y-0', 'sm:scale-100');
        modal.classList.add('opacity-0', 'pointer-events-none');
        document.body.style.overflow = '';
    };

    window.cancelCheckInput = function (input) {
        var btn     = document.getElementById('cancel-submit-btn');
        var isValid = input.value.trim() === 'CANCELAR';
        if (isValid) {
            btn.disabled  = false;
            btn.className = 'inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold rounded-lg transition-all bg-red-600 hover:bg-red-500 text-white cursor-pointer';
        } else {
            btn.disabled  = true;
            btn.className = 'inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold rounded-lg transition-all bg-slate-700 text-slate-500 cursor-not-allowed opacity-50';
        }
    };

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            var modal = document.getElementById('cancel-modal');
            if (!modal.classList.contains('pointer-events-none')) cancelModalClose();
        }
    });

    document.getElementById('cancel-modal').addEventListener('click', function (e) {
        if (e.target === this) cancelModalClose();
    });
})();
</script>

</x-basix.ubase>