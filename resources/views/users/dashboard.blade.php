<x-basix.ubase>

  {{-- @section('uheader')
    <div class="relative z-10 shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none lg:mx-auto lg:max-w-6xl">
      <div class="flex-1 px-4 flex justify-between sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
        @include('users.srch-bar')
        @include('users.notif-drop')
      </div>
    </div>
  @endsection --}}

  @include('comps.users.prof-header')
  @include('comps.users.cards-prev')
        
  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Compras recientes</h2>

  @include('comps.users.recent-act-mob')
  @include('comps.users.recent-act-desk')
</x-basix.ubase>