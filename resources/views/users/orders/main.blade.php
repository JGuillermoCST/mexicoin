<x-basix.ubase>  
    @props(['orders' => collect()])

    @php
        $avatarColors = [
            'bg-blue-500', 'bg-violet-500', 'bg-cyan-500',
            'bg-emerald-500', 'bg-rose-500', 'bg-amber-500', 'bg-pink-500',
        ];

        $methodConfig = [
            'paypal'   => ['label' => 'PayPal',       'icon' => '🅿'],
            'card'     => ['label' => 'Tarjeta',       'icon' => '💳'],
            'transfer' => ['label' => 'Transferencia', 'icon' => '🏦'],
        ];

        $statusConfig = [
            'confirmado' => ['label' => 'Pagado',  'class' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'],
            'pendiente'   => ['label' => 'Pendiente',   'class' => 'bg-amber-50 text-amber-700 ring-1 ring-amber-200'],
            'enviado'   => ['label' => 'Enviado',   'class' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'],
            'cancelado'    => ['label' => 'Cancelado',     'class' => 'bg-red-50 text-red-700 ring-1 ring-red-200'],
            'reembolsado'  => ['label' => 'Reembolsado', 'class' => 'bg-violet-50 text-violet-700 ring-1 ring-violet-200'],
        ];

        $dotConfig = [
            'confirmado' => 'bg-emerald-500',
            'enviado' => 'bg-emerald-500',
            'pendiente'   => 'bg-amber-400 animate-pulse',
            'cancelado'    => 'bg-red-500',
            'reembolsado'  => 'bg-violet-500',
        ];

        $total = $orders instanceof \Illuminate\Pagination\LengthAwarePaginator
            ? $orders->total()
            : count($orders);
    @endphp

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden lg:w-10/12 mx-auto lg:my-12" id="ot-wrap">

        {{-- Toolbar --}}
        <div class="flex flex-wrap items-center justify-between gap-3 px-6 py-4 border-b border-slate-100">
            <div>
                <p class="text-sm font-semibold text-slate-800">Órdenes</p>
                <p class="text-xs text-slate-400 mt-0.5" id="ot-count">{{ $total }} registros</p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                {{-- <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <input
                        id="ot-search"
                        type="text"
                        placeholder="Buscar nombre, email…"
                        oninput="otFilter()"
                        class="pl-9 pr-3 h-9 text-sm border border-slate-200 rounded-lg bg-slate-50 text-slate-800 placeholder-slate-300 outline-none focus:border-slate-800 focus:bg-white transition w-56"
                    >
                </div> --}}

                <select
                    id="ot-status-filter"
                    onchange="otFilter()"
                    class="h-9 px-8 text-sm border border-slate-200 rounded-lg bg-slate-50 text-slate-600 outline-none focus:border-slate-800 transition cursor-pointer"
                >
                    <option value="">Todos los estatus</option>
                    <option value="completed">Completado</option>
                    <option value="pending">Pendiente</option>
                    <option value="failed">Fallido</option>
                    <option value="refunded">Reembolsado</option>
                </select>
            </div>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="ot-table">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th onclick="otSort('name')" class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider cursor-pointer hover:text-slate-700 transition select-none whitespace-nowrap">
                            Cliente <span class="inline-block ml-1 opacity-40 text-xs" id="sort-name">↑</span>
                        </th>
                        <th onclick="otSort('email')" class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider cursor-pointer hover:text-slate-700 transition select-none whitespace-nowrap hidden sm:table-cell">
                            Email <span class="inline-block ml-1 opacity-40 text-xs" id="sort-email">↑</span>
                        </th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">
                            Método
                        </th>
                        <th onclick="otSort('status')" class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider cursor-pointer hover:text-slate-700 transition select-none whitespace-nowrap">
                            Estatus <span class="inline-block ml-1 opacity-40 text-xs" id="sort-status">↑</span>
                        </th>
                        <th onclick="otSort('total')" class="px-5 py-3 text-right text-xs font-semibold text-slate-400 uppercase tracking-wider cursor-pointer hover:text-slate-700 transition select-none whitespace-nowrap">
                            Total <span class="inline-block ml-1 opacity-40 text-xs" id="sort-total">↑</span>
                        </th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody id="ot-tbody">
                    @forelse($orders as $order)
                        @php
                            $initial   = strtoupper(substr($order->name ?? '?', 0, 1));
                            $colorIdx  = abs(crc32($order->email ?? '')) % count($avatarColors);
                            $avatarBg  = $avatarColors[$colorIdx];
                            $method    = $methodConfig[$order->payment_method] ?? ['label' => ucfirst($order->payment_method ?? '—'), 'icon' => '💲'];
                            $statusKey = $order->status ?? 'pending';
                            $statusCfg = $statusConfig[$statusKey] ?? $statusConfig['pending'];
                            $dotClass  = $dotConfig[$statusKey] ?? 'bg-slate-400';
                            $totalFmt  = '$' . number_format($order->total ?? 0, 2) . ' MXN';
                            $date      = isset($order->created_at)
                                ? \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i')
                                : '—';

                            $orderJson = json_encode([
                                'id'             => $order->id,
                                'name'           => $order->name,
                                'email'          => $order->email,
                                'payment_method' => $method['label'],
                                'payment_icon'   => $method['icon'],
                                'status'         => $statusKey,
                                'status_label'   => $statusCfg['label'],
                                'status_class'   => $statusCfg['class'],
                                'dot_class'      => $dotClass,
                                'total'          => $totalFmt,
                                'date'           => $date,
                            ]);
                        @endphp
                        <tr
                            class="border-b border-slate-100 hover:bg-slate-50 transition-colors"
                            data-name="{{ strtolower($order->name ?? '') }}"
                            data-email="{{ strtolower($order->email ?? '') }}"
                            data-status="{{ $statusKey }}"
                            data-total="{{ $order->total ?? 0 }}"
                        >
                            {{-- Cliente --}}
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full {{ $avatarBg }} flex items-center justify-center text-white text-xs font-bold shrink-0">
                                        {{ $initial }}
                                    </div>
                                    <span class="font-medium text-slate-800">{{ $order->name ?? '—' }}</span>
                                </div>
                            </td>

                            {{-- Email --}}
                            <td class="px-5 py-4 text-slate-500 whitespace-nowrap hidden sm:table-cell">
                                {{ $order->email ?? '—' }}
                            </td>

                            {{-- Método --}}
                            <td class="px-5 py-4 whitespace-nowrap hidden md:table-cell">
                                <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-600 text-xs font-medium px-2.5 py-1 rounded-lg">
                                    {{ $method['icon'] }} {{ $method['label'] }}
                                </span>
                            </td>

                            {{-- Estatus --}}
                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-1 rounded-full {{ $statusCfg['class'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                    {{ $statusCfg['label'] }}
                                </span>
                            </td>

                            {{-- Total --}}
                            <td class="px-5 py-4 text-right whitespace-nowrap">
                                <span class="font-semibold text-slate-800">{{ $totalFmt }}</span>
                            </td>

                            {{-- Acción --}}
                            <td class="px-5 py-4 whitespace-nowrap">
                                <button
                                    onclick='otOpenModal({{ $orderJson }})'
                                    class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-700 hover:bg-slate-800 hover:text-white hover:border-slate-800 transition-all duration-150 cursor-pointer"
                                >
                                    Ver detalles
                                    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="py-16 text-center text-slate-400">
                                    <svg class="mx-auto mb-3 opacity-40" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                        <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        <line x1="9" y1="12" x2="15" y2="12"/>
                                        <line x1="9" y1="16" x2="13" y2="16"/>
                                    </svg>
                                    <p class="text-sm">No hay órdenes que mostrar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Empty state al filtrar --}}
            <div id="ot-no-results" class="hidden py-16 text-center text-slate-400">
                <svg class="mx-auto mb-3 opacity-40" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35M11 8v6M8 11h6"/>
                </svg>
                <p class="text-sm">Sin resultados para tu búsqueda.</p>
            </div>
        </div>

        {{-- Footer / paginación --}}
        <div class="flex flex-wrap items-center justify-between gap-3 px-6 py-3 border-t border-slate-100">
            <p class="text-xs text-slate-400" id="ot-footer-count">
                Mostrando
                <strong class="text-slate-600">{{ $orders instanceof \Illuminate\Pagination\LengthAwarePaginator ? $orders->count() : count($orders) }}</strong>
                de
                <strong class="text-slate-600">{{ $total }}</strong>
                órdenes
            </p>

            @if($orders instanceof \Illuminate\Pagination\LengthAwarePaginator && $orders->hasPages())
                <div>{{ $orders->links() }}</div>
            @endif
        </div>
    </div>

    {{-- ══════════════════════════════════════════
        MODAL DE DETALLE
    ══════════════════════════════════════════ --}}
    <div
        id="ot-modal"
        class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200">
        
        <div
            id="ot-modal-box"
            class="relative w-full sm:max-w-md bg-white sm:rounded-2xl rounded-t-2xl shadow-2xl translate-y-4 sm:translate-y-0 sm:scale-95 transition-all duration-200"
        >
            {{-- Handle móvil --}}
            <div class="flex justify-center pt-3 pb-1 sm:hidden">
                <div class="w-10 h-1 bg-slate-200 rounded-full"></div>
            </div>

            {{-- Header --}}
            <div class="flex items-center justify-between px-6 pt-4 pb-4 border-b border-slate-100">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-0.5">Detalle de orden</p>
                    <p class="text-base font-semibold text-slate-800" id="modal-name">—</p>
                </div>
                <button
                    onclick="otCloseModal()"
                    class="w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition cursor-pointer"
                >
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M18 6 6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="px-6 py-5 space-y-3">

                {{-- Avatar + info --}}
                <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl">
                    <div id="modal-avatar" class="w-12 h-12 rounded-full flex items-center justify-center text-white text-base font-bold shrink-0 bg-blue-500">?</div>
                    <div class="min-w-0">
                        <p class="font-semibold text-slate-800 truncate" id="modal-name-2">—</p>
                        <p class="text-sm text-slate-500 truncate" id="modal-email">—</p>
                    </div>
                </div>

                {{-- Grid de datos --}}
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-slate-50 rounded-xl p-3">
                        <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1.5">Estatus</p>
                        <span id="modal-status-badge" class="inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-1 rounded-full">
                            <span id="modal-status-dot" class="w-1.5 h-1.5 rounded-full"></span>
                            <span id="modal-status-label">—</span>
                        </span>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-3">
                        <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1.5">Método de pago</p>
                        <p class="text-sm font-medium text-slate-700" id="modal-method">—</p>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-3">
                        <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1.5">Total</p>
                        <p class="text-base font-bold text-slate-800" id="modal-total">—</p>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-3">
                        <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1.5">Fecha</p>
                        <p class="text-sm font-medium text-slate-700" id="modal-date">—</p>
                    </div>
                </div>

                {{-- ID de orden --}}
                <div class="flex items-center justify-between px-3 py-2.5 bg-slate-50 rounded-xl">
                    <span class="text-xs text-slate-400 font-medium">ID de orden</span>
                    <code class="text-xs font-mono text-slate-600 bg-white border border-slate-200 px-2 py-0.5 rounded-md" id="modal-id">—</code>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-2 px-6 pb-6 pt-1">
                <button
                    onclick="otCloseModal()"
                    class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition cursor-pointer"
                >
                    Cerrar
                </button>
                <a
                    id="modal-detail-link"
                    href="#"
                    class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-slate-800 hover:bg-slate-900 rounded-lg transition"
                >
                    Ir a la orden
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                </a>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            (function () {
            var sortState = { col: null, dir: 'asc' };

            /* ── Filtro ── */
            window.otFilter = function () {
                var q      = document.getElementById('ot-search').value.toLowerCase().trim();
                var status = document.getElementById('ot-status-filter').value;
                var rows   = document.querySelectorAll('#ot-tbody tr[data-name]');
                var shown  = 0;

                rows.forEach(function (row) {
                    var match = (!q      || row.dataset.name.includes(q) || row.dataset.email.includes(q))
                                && (!status || row.dataset.status === status);
                    row.style.display = match ? '' : 'none';
                    if (match) shown++;
                });

                document.getElementById('ot-no-results').classList.toggle('hidden', shown > 0);
                document.getElementById('ot-footer-count').innerHTML =
                    'Mostrando <strong class="text-slate-600">' + shown +
                    '</strong> de <strong class="text-slate-600">' + rows.length + '</strong> órdenes';
            };

            /* ── Ordenar ── */
            window.otSort = function (col) {
                sortState.dir = sortState.col === col
                    ? (sortState.dir === 'asc' ? 'desc' : 'asc')
                    : 'asc';
                sortState.col = col;

                ['name','email','status','total'].forEach(function (c) {
                    var el = document.getElementById('sort-' + c);
                    if (!el) return;
                    el.style.opacity  = c === col ? '1'   : '0.4';
                    el.textContent    = c === col ? (sortState.dir === 'asc' ? '↑' : '↓') : '↑';
                });

                var tbody = document.getElementById('ot-tbody');
                var rows  = Array.from(tbody.querySelectorAll('tr[data-name]'));

                rows.sort(function (a, b) {
                    var va = a.dataset[col] || '';
                    var vb = b.dataset[col] || '';
                    if (col === 'total') {
                        return sortState.dir === 'asc'
                            ? parseFloat(va) - parseFloat(vb)
                            : parseFloat(vb) - parseFloat(va);
                    }
                    return sortState.dir === 'asc'
                        ? va.localeCompare(vb, 'es')
                        : vb.localeCompare(va, 'es');
                });

                rows.forEach(function (row) { tbody.appendChild(row); });
            };

            /* ── Modal ── */
            window.otOpenModal = function (order) {
                document.getElementById('modal-name').textContent   = order.name  || '—';
                document.getElementById('modal-name-2').textContent = order.name  || '—';
                document.getElementById('modal-email').textContent  = order.email || '—';
                document.getElementById('modal-total').textContent  = order.total || '—';
                document.getElementById('modal-date').textContent   = order.date  || '—';
                document.getElementById('modal-id').textContent     = '#' + order.id;
                document.getElementById('modal-method').textContent = order.payment_icon + ' ' + order.payment_method;

                /* Avatar color */
                var colors = ['bg-blue-500','bg-violet-500','bg-cyan-500','bg-emerald-500','bg-rose-500','bg-amber-500','bg-pink-500'];
                var hash   = Array.from(order.email || '').reduce(function(acc, c){ return acc + c.charCodeAt(0); }, 0);
                var av     = document.getElementById('modal-avatar');
                av.textContent = (order.name || '?').charAt(0).toUpperCase();
                av.className   = 'w-12 h-12 rounded-full flex items-center justify-center text-white text-base font-bold shrink-0 ' + colors[hash % colors.length];

                /* Badge estatus */
                document.getElementById('modal-status-badge').className =
                    'inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-1 rounded-full ' + (order.status_class || '');
                document.getElementById('modal-status-dot').className   =
                    'w-1.5 h-1.5 rounded-full ' + (order.dot_class || '');
                document.getElementById('modal-status-label').textContent = order.status_label || '—';

                document.getElementById('modal-detail-link').href = '/orders/' + order.id;

                /* Animar apertura */
                var modal = document.getElementById('ot-modal');
                var box   = document.getElementById('ot-modal-box');
                modal.classList.remove('opacity-0', 'pointer-events-none');
                requestAnimationFrame(function () {
                    box.classList.remove('translate-y-4', 'sm:scale-95');
                    box.classList.add('translate-y-0', 'sm:scale-100');
                });
                document.body.style.overflow = 'hidden';
            };

            window.otCloseModal = function () {
                var modal = document.getElementById('ot-modal');
                var box   = document.getElementById('ot-modal-box');
                box.classList.add('translate-y-4', 'sm:scale-95');
                box.classList.remove('translate-y-0', 'sm:scale-100');
                modal.classList.add('opacity-0', 'pointer-events-none');
                document.body.style.overflow = '';
            };

            /* Cerrar al hacer clic en el backdrop */
            document.getElementById('ot-modal').addEventListener('click', function (e) {
                if (e.target === this) otCloseModal();
            });

            /* Cerrar con Escape */
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    var modal = document.getElementById('ot-modal');
                    if (!modal.classList.contains('pointer-events-none')) otCloseModal();
                }
            });
            })();
        </script>
    @endpush
</x-basix.ubase>