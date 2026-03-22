<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
  <h2 class="text-xl font-semibold tracking-tight text-gray-900">Prevista</h2>
  
  <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    
    <!-- Card -->
    <div class="bg-white overflow-hidden border border-gray-100 shadow-sm rounded-2xl transition-all hover:shadow-lg hover:-translate-y-1">
      <div class="p-5">
        <div class="flex items-center">
          <div class="shrink-0">
            <!-- Heroicon: outline/scale -->
            <svg class="h-7 w-7 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
            </svg>
          </div>
          <div class="ml-5 w-0 flex-1">
            <dl>
              <dt class="text-sm font-medium text-gray-500 truncate">Balance de compras</dt>
              <dd>
                <div class="text-lg font-semibold text-gray-900">${{ number_format($totalSpent, 2) }}</div>
              </dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-5 py-3">
        <div class="text-sm">
          <a href="{{ route('orders') }}" class="font-semibold text-cyan-700 hover:text-cyan-900 transition-colors">Ver mis compras →</a>
        </div>
      </div>
    </div>

  </div>
</div>
