<section class="px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            {{-- ── Toolbar ── --}}
            <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 border-b border-slate-100">
                <div>
                    <h2 class="text-base font-semibold text-slate-800">Catálogo de productos</h2>
                    <p class="text-xs text-slate-400 mt-0.5">{{ $products->total() }} productos en total</p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none w-4 h-4"
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                        </svg>
                        <input id="prod-search" type="text" placeholder="Buscar producto…" oninput="prodFilter()"
                               class="pl-9 pr-3 h-9 text-sm border border-slate-200 rounded-lg bg-slate-50 text-slate-800 placeholder-slate-300 outline-none focus:border-slate-800 focus:bg-white transition w-48">
                    </div>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-700 active:scale-95 text-white text-sm font-semibold px-4 py-2 rounded-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                        </svg>
                        Nuevo producto
                    </button>
                </div>
            </div>

            {{-- ── Tabla ── --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Producto</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider hidden sm:table-cell">Categoría</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Precio</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider hidden md:table-cell">Stock</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody id="prod-tbody">
                        @forelse($products as $p)
                            @php
                                $catName   = $categories[$p->category_id - 1]->name ?? '—';
                                $stockClass = $p->stock > 10
                                    ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'
                                    : ($p->stock > 0 ? 'bg-amber-50 text-amber-700 ring-1 ring-amber-200' : 'bg-red-50 text-red-600 ring-1 ring-red-200');
                                $stockDot = $p->stock > 10 ? 'bg-emerald-500' : ($p->stock > 0 ? 'bg-amber-400 animate-pulse' : 'bg-red-500');

                                $productJson = json_encode([
                                    'id'          => $p->id,
                                    'name'        => $p->name,
                                    'category'    => $catName,
                                    'category_id' => $p->category_id,
                                    'price'       => $p->price,
                                    'stock'       => $p->stock,
                                    'description' => $p->description ?? '',
                                    'image'       => $p->image ? asset('assets/products/mains/' . $p->image) : null,
                                    'delete_url'  => url('/administracion/productos/' . $p->id),
                                ]);
                            @endphp
                            <tr class="border-b border-slate-100 last:border-none hover:bg-slate-50 transition-colors"
                                data-name="{{ strtolower($p->name) }}"
                                data-category="{{ strtolower($catName) }}">

                                {{-- Producto --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                                            @if($p->image)
                                                <img src="{{ asset('assets/products/mains/' . $p->image) }}"
                                                     alt="{{ $p->name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-semibold text-slate-800 truncate max-w-[180px]">{{ $p->name }}</p>
                                            <p class="text-xs text-slate-400 mt-0.5 sm:hidden">{{ $catName }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-5 py-4 hidden sm:table-cell">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                        {{ $catName }}
                                    </span>
                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">
                                    <span class="font-semibold text-slate-800">${{ number_format($p->price, 2) }}</span>
                                    <span class="text-xs text-slate-400 ml-1">MXN</span>
                                </td>

                                <td class="px-5 py-4 hidden md:table-cell">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $stockClass }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $stockDot }}"></span>
                                        {{ $p->stock }} pzs
                                    </span>
                                </td>

                                {{-- Acciones ── 3 botones → 3 modales --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">

                                        {{-- Ver --}}
                                        <button onclick='prodOpenView({{ $productJson }})'
                                                class="inline-flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-800 hover:text-white hover:border-slate-800 transition-all duration-150 cursor-pointer">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178Z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                            Ver
                                        </button>

                                        {{-- Editar --}}
                                        <button onclick='prodOpenEdit({{ $productJson }})'
                                                class="inline-flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-150 cursor-pointer">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"/>
                                            </svg>
                                            Editar
                                        </button>

                                        {{-- Eliminar --}}
                                        <button onclick='prodOpenDelete({{ $productJson }})'
                                                class="inline-flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-red-500 hover:text-white hover:border-red-500 transition-all duration-150 cursor-pointer">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                            Eliminar
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="py-16 text-center text-slate-400">
                                        <svg class="mx-auto mb-3 w-10 h-10 opacity-40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0v9l-9 5.25M3 7.5v9l9 5.25"/>
                                        </svg>
                                        <p class="text-sm">No hay productos registrados.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="prod-no-results" class="hidden py-16 text-center text-slate-400">
                    <svg class="mx-auto mb-3 w-10 h-10 opacity-40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <p class="text-sm">Sin resultados para tu búsqueda.</p>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex flex-wrap items-center justify-between gap-3 px-6 py-4 border-t border-slate-100">
                <p class="text-xs text-slate-400" id="prod-count">
                    Mostrando <strong class="text-slate-600">{{ $products->count() }}</strong>
                    de <strong class="text-slate-600">{{ $products->total() }}</strong> productos
                </p>
                <div class="text-sm">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════
     MODAL: VER PRODUCTO
══════════════════════════════════════════════════ --}}
<div id="modal-view" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200">
    <div id="modal-view-box" class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl scale-95 transition-transform duration-200 overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Detalle del producto</p>
            <button onclick="prodClose('modal-view')" class="w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 transition cursor-pointer">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Body --}}
        <div class="p-6">
            <div class="flex items-start gap-5 mb-6">
                <div class="w-20 h-20 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0" id="view-img-wrap">
                    <img id="view-img" src="" alt="" class="w-full h-full object-cover hidden">
                    <div id="view-img-placeholder" class="w-full h-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"/>
                        </svg>
                    </div>
                </div>
                <div class="min-w-0 flex-1">
                    <h3 id="view-name" class="text-lg font-bold text-slate-800 leading-tight mb-1"></h3>
                    <span id="view-category" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600"></span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 mb-4">
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1">Precio</p>
                    <p id="view-price" class="text-lg font-bold text-slate-800"></p>
                </div>
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1">Stock</p>
                    <p id="view-stock" class="text-lg font-bold text-slate-800"></p>
                </div>
            </div>

            <div id="view-desc-wrap" class="bg-slate-50 rounded-xl p-4 hidden">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1">Descripción</p>
                <p id="view-desc" class="text-sm text-slate-600 leading-relaxed"></p>
            </div>
        </div>

        <div class="flex justify-end gap-2 px-6 pb-5">
            <button onclick="prodClose('modal-view')" class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition cursor-pointer">
                Cerrar
            </button>
            <button id="view-edit-btn" onclick="" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition cursor-pointer">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"/></svg>
                Editar
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════
     MODAL: ELIMINAR PRODUCTO
══════════════════════════════════════════════════ --}}
<div id="modal-delete" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200">
    <div id="modal-delete-box" class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl scale-95 transition-transform duration-200">

        <div class="flex items-start justify-between px-6 pt-5 pb-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Eliminar producto</p>
                    <p class="text-xs text-slate-500 mt-0.5">Esta acción no se puede deshacer</p>
                </div>
            </div>
            <button onclick="prodClose('modal-delete')" class="w-7 h-7 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 transition cursor-pointer">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="px-6 py-5">
            <p class="text-sm text-slate-600 leading-relaxed">
                ¿Estás seguro de que deseas eliminar
                <strong id="delete-name" class="text-slate-800"></strong>?
                Esta acción es permanente y no se podrá recuperar.
            </p>
        </div>

        <form id="delete-form" method="POST" class="px-6 pb-6">
            @csrf
            @method('DELETE')
            <div class="flex items-center justify-end gap-2">
                <button type="button" onclick="prodClose('modal-delete')"
                        class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition cursor-pointer">
                    Cancelar
                </button>
                <button type="submit"
                        class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-red-600 hover:bg-red-500 rounded-lg transition cursor-pointer">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                    </svg>
                    Sí, eliminar
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        (function () {

            /* ── Helpers de apertura / cierre ── */
            function openModal(id) {
                var modal = document.getElementById(id);
                var box   = document.getElementById(id + '-box');
                modal.classList.remove('opacity-0', 'pointer-events-none');
                requestAnimationFrame(function () {
                    box.classList.remove('scale-95', 'translate-y-4', 'sm:scale-95');
                    box.classList.add('scale-100', 'translate-y-0', 'sm:scale-100');
                });
                document.body.style.overflow = 'hidden';
            }

            window.prodClose = function (id) {
                var modal = document.getElementById(id);
                var box   = document.getElementById(id + '-box');
                box.classList.add('scale-95', 'translate-y-4', 'sm:scale-95');
                box.classList.remove('scale-100', 'translate-y-0', 'sm:scale-100');
                modal.classList.add('opacity-0', 'pointer-events-none');
                document.body.style.overflow = '';
            };

            /* Cerrar al hacer clic en backdrop */
            ['modal-view', 'modal-delete'].forEach(function (id) {
                document.getElementById(id).addEventListener('click', function (e) {
                    if (e.target === this) window.prodClose(id);
                });
            });

            /* Escape */
            document.addEventListener('keydown', function (e) {
                if (e.key !== 'Escape') return;
                ['modal-view', 'modal-delete'].forEach(function (id) {
                    if (!document.getElementById(id).classList.contains('pointer-events-none'))
                        window.prodClose(id);
                });
            });

            /* ── Modal VER ── */
            window.prodOpenView = function (p) {
                var img = document.getElementById('view-img');
                var ph  = document.getElementById('view-img-placeholder');

                if (p.image) {
                    img.src = p.image;
                    img.alt = p.name;
                    img.classList.remove('hidden');
                    ph.classList.add('hidden');
                } else {
                    img.classList.add('hidden');
                    ph.classList.remove('hidden');
                }

                document.getElementById('view-name').textContent     = p.name;
                document.getElementById('view-category').textContent = p.category;
                document.getElementById('view-price').textContent    = '$' + parseFloat(p.price).toLocaleString('es-MX', { minimumFractionDigits: 2 }) + ' MXN';
                document.getElementById('view-stock').textContent    = p.stock + ' piezas';

                var descWrap = document.getElementById('view-desc-wrap');
                if (p.description) {
                    document.getElementById('view-desc').textContent = p.description;
                    descWrap.classList.remove('hidden');
                } else {
                    descWrap.classList.add('hidden');
                }

                /* Botón "Editar" dentro del modal de ver */
                document.getElementById('view-edit-btn').onclick = function () {
                    window.prodClose('modal-view');
                    window.prodOpenEdit(p);
                };

                openModal('modal-view');
            };

            /* ── Modal ELIMINAR ── */
            window.prodOpenDelete = function (p) {
                document.getElementById('delete-name').textContent = p.name;
                document.getElementById('delete-form').action      = p.delete_url;
                openModal('modal-delete');
            };

            /* ── Buscador ── */
            window.prodFilter = function () {
                var q    = document.getElementById('prod-search').value.toLowerCase().trim();
                var rows = document.querySelectorAll('#prod-tbody tr[data-name]');
                var shown = 0;

                rows.forEach(function (row) {
                    var match = !q || row.dataset.name.includes(q) || row.dataset.category.includes(q);
                    row.style.display = match ? '' : 'none';
                    if (match) shown++;
                });

                document.getElementById('prod-no-results').classList.toggle('hidden', shown > 0);
                document.getElementById('prod-count').innerHTML =
                    'Mostrando <strong class="text-slate-600">' + shown + '</strong> de <strong class="text-slate-600">' + rows.length + '</strong> productos';
            };

        })();
    </script>
@endpush