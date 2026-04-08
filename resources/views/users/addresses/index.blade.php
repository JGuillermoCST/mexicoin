<x-basix.ubase>

{{--
|--------------------------------------------------------------------------
| Vista: Mis direcciones
|--------------------------------------------------------------------------
| Uso desde el controlador:
|   return view('addresses.index', ['addresses' => auth()->user()->addresses]);
|
| Rutas necesarias en web.php:
|   Route::resource('addresses', AddressController::class)->middleware('auth');
--}}

<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">

    {{-- ── Header ── --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Mis direcciones</h1>
            <p class="text-sm text-slate-500 mt-1">Gestiona las direcciones guardadas en tu cuenta.</p>
        </div>
        <button
            onclick="addrModalOpen()"
            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-all"
        >
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
            </svg>
            Nueva dirección
        </button>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-4 py-3 rounded-lg">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- ── Tabla ── --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        @if($addresses->isEmpty())
            {{-- Empty state --}}
            <div class="py-20 text-center">
                <svg class="mx-auto mb-4 text-slate-300 w-12 h-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                </svg>
                <p class="text-sm font-medium text-slate-500">No tienes direcciones guardadas.</p>
                <button onclick="addrModalOpen()" class="mt-4 text-sm text-blue-600 hover:underline font-medium">
                    Agregar tu primera dirección
                </button>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider whitespace-nowrap">Alias</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider whitespace-nowrap hidden sm:table-cell">Calle</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider whitespace-nowrap hidden md:table-cell">Ciudad / Estado</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider whitespace-nowrap hidden lg:table-cell">C.P.</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider whitespace-nowrap hidden lg:table-cell">País</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addresses as $address)
                            <tr class="border-b border-slate-100 last:border-none hover:bg-slate-50 transition-colors">

                                {{-- Alias --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-slate-800">{{ $address->name }}</span>
                                    </div>
                                </td>

                                {{-- Calle --}}
                                <td class="px-5 py-4 text-slate-500 hidden sm:table-cell">
                                    {{ $address->street }}{{ $address->street2 ? ', ' . $address->street2 : '' }},
                                    #{{ $address->number_ext }}{{ $address->number_int ? ' Int. ' . $address->number_int : '' }}
                                </td>

                                {{-- Ciudad / Estado --}}
                                <td class="px-5 py-4 text-slate-500 whitespace-nowrap hidden md:table-cell">
                                    {{ $address->city }}, {{ $address->state }}
                                </td>

                                {{-- C.P. --}}
                                <td class="px-5 py-4 text-slate-500 hidden lg:table-cell">
                                    {{ $address->zip_code }}
                                </td>

                                {{-- País --}}
                                <td class="px-5 py-4 text-slate-500 hidden lg:table-cell">
                                    {{ $address->country }}
                                </td>

                                {{-- Acciones --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">

                                        {{-- Editar --}}
                                        <button
                                            onclick="addrModalOpen({{ $address->toJson() }})"
                                            class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-700 hover:bg-slate-800 hover:text-white hover:border-slate-800 transition-all duration-150 cursor-pointer"
                                        >
                                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                                            </svg>
                                            Editar
                                        </button>

                                        {{-- Eliminar --}}
                                        <form action="{{ route('addresses.destroy', $address->id) }}" method="POST"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar esta dirección?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-lg border border-red-200 bg-white text-red-500 hover:bg-red-500 hover:text-white hover:border-red-500 transition-all duration-150 cursor-pointer">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Footer con conteo --}}
            <div class="px-6 py-3 border-t border-slate-100">
                <p class="text-xs text-slate-400">
                    {{ $addresses->count() }} {{ $addresses->count() === 1 ? 'dirección registrada' : 'direcciones registradas' }}
                </p>
            </div>
        @endif
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL AGREGAR / EDITAR DIRECCIÓN
══════════════════════════════════════════ --}}
<div
    id="addr-modal"
    class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200"
>
    <div
        id="addr-modal-box"
        class="relative w-full sm:max-w-2xl bg-white sm:rounded-2xl rounded-t-2xl shadow-2xl translate-y-4 sm:translate-y-0 sm:scale-95 transition-all duration-200 max-h-[90vh] overflow-y-auto"
    >
        {{-- Handle móvil --}}
        <div class="flex justify-center pt-3 pb-1 sm:hidden sticky top-0 bg-white z-10">
            <div class="w-10 h-1 bg-slate-200 rounded-full"></div>
        </div>

        {{-- Header --}}
        <div class="flex items-center justify-between px-6 pt-4 pb-4 border-b border-slate-100 sticky top-0 bg-white z-10">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-0.5" id="modal-eyebrow">Nueva dirección</p>
                <h2 class="text-base font-semibold text-slate-800" id="modal-title">Agregar dirección</h2>
            </div>
            <button onclick="addrModalClose()" class="w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition cursor-pointer">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Form --}}
        <form id="addr-form" method="POST" class="px-6 py-5">
            @csrf
            <input type="hidden" name="_method" id="addr-method" value="POST">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                {{-- Alias --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Alias de la dirección <span class="text-red-400">*</span>
                    </label>
                    <input id="f-name" name="name" type="text" required
                           placeholder="Ej: Casa, Oficina, Almacén…"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Calle principal --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Calle <span class="text-red-400">*</span>
                    </label>
                    <input id="f-street" name="street" type="text" required
                           placeholder="Nombre de la calle"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Calle 2 --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Colonia / Fraccionamiento <span class="text-red-400">*</span>
                    </label>
                    <input id="f-street2" name="street2" type="text"
                           placeholder="Colonia o fraccionamiento"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Número exterior --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Número exterior <span class="text-red-400">*</span>
                    </label>
                    <input id="f-number-ext" name="number_ext" type="text" required
                           placeholder="Ej: 42"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Número interior --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Número interior
                    </label>
                    <input id="f-number-int" name="number_int" type="text"
                           placeholder="Ej: Depto. 3 (opcional)"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Ciudad --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Ciudad <span class="text-red-400">*</span>
                    </label>
                    <input id="f-city" name="city" type="text" required
                           placeholder="Ciudad"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Estado <span class="text-red-400">*</span>
                    </label>
                    <input id="f-state" name="state" type="text" required
                           placeholder="Estado"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- Código postal --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        Código postal <span class="text-red-400">*</span>
                    </label>
                    <input id="f-zip" name="zip_code" type="text" required maxlength="10"
                           placeholder="Ej: 44100"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

                {{-- País --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                        País <span class="text-red-400">*</span>
                    </label>
                    <input id="f-country" name="country" type="text" required
                           placeholder="México"
                           class="w-full px-3 py-2.5 text-sm border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"/>
                </div>

            </div>

            {{-- Errores de validación --}}
            @if($errors->any())
                <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="text-xs text-red-600 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Footer del modal --}}
            <div class="flex items-center justify-end gap-2 pt-6 pb-1">
                <button type="button" onclick="addrModalClose()"
                        class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition cursor-pointer">
                    Cancelar
                </button>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition cursor-pointer">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span id="modal-btn-label">Guardar dirección</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
(function () {

    /* ── Abrir modal ── */
    window.addrModalOpen = function (address) {
        var isEdit = !!address;
        var modal  = document.getElementById('addr-modal');
        var box    = document.getElementById('addr-modal-box');
        var form   = document.getElementById('addr-form');

        /* Configurar acción del form */
        if (isEdit) {
            form.action = '/mis-direcciones/' + address.id;
            document.getElementById('addr-method').value  = 'PUT';
            document.getElementById('modal-eyebrow').textContent = 'Editar dirección';
            document.getElementById('modal-title').textContent   = address.name;
            document.getElementById('modal-btn-label').textContent = 'Guardar cambios';
        } else {
            form.action = '{{ route('addresses.store') }}';
            document.getElementById('addr-method').value  = 'POST';
            document.getElementById('modal-eyebrow').textContent = 'Nueva dirección';
            document.getElementById('modal-title').textContent   = 'Agregar dirección';
            document.getElementById('modal-btn-label').textContent = 'Guardar dirección';
        }

        /* Rellenar campos */
        document.getElementById('f-name').value       = address ? address.name        : '';
        document.getElementById('f-street').value     = address ? address.street      : '';
        document.getElementById('f-street2').value    = address ? address.street2     : '';
        document.getElementById('f-number-ext').value = address ? address.number_ext  : '';
        document.getElementById('f-number-int').value = address ? address.number_int  : '';
        document.getElementById('f-city').value       = address ? address.city        : '';
        document.getElementById('f-state').value      = address ? address.state       : '';
        document.getElementById('f-zip').value        = address ? address.zip_code    : '';
        document.getElementById('f-country').value    = address ? address.country     : '';

        /* Animar apertura */
        modal.classList.remove('opacity-0', 'pointer-events-none');
        requestAnimationFrame(function () {
            box.classList.remove('translate-y-4', 'sm:scale-95');
            box.classList.add('translate-y-0', 'sm:scale-100');
        });
        document.body.style.overflow = 'hidden';
    };

    /* ── Cerrar modal ── */
    window.addrModalClose = function () {
        var modal = document.getElementById('addr-modal');
        var box   = document.getElementById('addr-modal-box');
        box.classList.add('translate-y-4', 'sm:scale-95');
        box.classList.remove('translate-y-0', 'sm:scale-100');
        modal.classList.add('opacity-0', 'pointer-events-none');
        document.body.style.overflow = '';
    };

    /* Cerrar al hacer clic en el backdrop */
    document.getElementById('addr-modal').addEventListener('click', function (e) {
        if (e.target === this) addrModalClose();
    });

    /* Cerrar con Escape */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            var modal = document.getElementById('addr-modal');
            if (!modal.classList.contains('pointer-events-none')) addrModalClose();
        }
    });

    /* Reabrir modal con errores de validación si hubo un submit fallido */
    @if($errors->any())
        addrModalOpen();
    @endif

})();
</script>

</x-basix.ubase>