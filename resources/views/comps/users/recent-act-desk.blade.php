@if ($ords->isEmpty())
    <p class="my-4 text-2xl text-center text-gray-500">No has realizado ninguna compra aún.</p>
@else
  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Mis últimos pedidos</h2>
  
  <!-- Tabla de actividad mejorada -->
  <div class="hidden sm:block bg-white py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col mt-4">
        <div class="overflow-x-auto shadow-lg rounded-2xl border border-gray-100">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Orden
                </th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Total
                </th>
                <th class="hidden md:table-cell px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Estatus
                </th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Fecha de compra
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-100">
              
              @foreach ($ords as $order)
              <tr class="transition-all hover:bg-indigo-50/70">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center space-x-3">
                    <div class="shrink-0 bg-indigo-100 p-2 rounded-full">
                      <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                      </svg>
                    </div>
                    <div>
                      <p class="text-gray-900 font-medium group-hover:text-indigo-700">Orden #{{ $order['id'] }}</p>
                      {{-- <p class="text-gray-400 text-xs">ID #{{ rand(10000,99999) }}</p> --}}
                    </div>
                  </div>
                </td>

                <td class="px-6 py-4 text-right text-sm">
                  <span class="text-gray-900 font-semibold">${{ number_format($order['total'], 2) }}</span>
                  <span class="text-gray-400 text-xs">MXN</span>
                </td>

                <td class="hidden md:table-cell px-6 py-4 text-center">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Enviado
                  </span>
                </td>

                <td class="px-6 py-4 text-right text-sm text-gray-600">
                  <time datetime="2025-05-22">22 Mayo, 2025</time>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

          {{-- <!-- Paginación -->
          <div class="flex items-center justify-between px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-2xl">
            <p class="hidden sm:block text-sm text-gray-600">
              Mostrando <span class="font-semibold text-gray-900">1</span> a <span class="font-semibold text-gray-900">4</span> de <span class="font-semibold text-gray-900">20</span> resultados
            </p>
            <div class="flex space-x-2">
              <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition">
                ← Anterior
              </button>
              <button class="px-4 py-2 bg-indigo-600 border border-indigo-600 rounded-lg text-sm text-white hover:bg-indigo-700 transition">
                Siguiente →
              </button>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endif
