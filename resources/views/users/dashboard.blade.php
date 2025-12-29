<x-app-layout>
    <div class="min-h-full">
      <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
      <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
                      
        @include('users.mob-nav')
        @include('users.desk-nav')
    
        <div class="lg:pl-64 flex flex-col flex-1">
          <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
            @include('users.sidebar-btn')

            <div class="flex-1 px-4 flex justify-between sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
              {{-- @include('users.srch-bar') --}}
              @include('users.notif-drop')
            </div>
          </div>
      
          <main class="flex-1 pb-8">
            @include('users.prof-header')
    
            <div class="mt-8">
              @include('users.cards-prev')
    
              <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Compras recientes</h2>
    
              @include('users.recent-act-mob')
              @include('users.recent-act-desk')
            </div>
          </main>
        </div>
      </div>
  
      @livewireScripts
      @include('structure.scripts')
    </div>
</x-app-layout>