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

  @include('comps.users.recent-act-mob')
  @include('comps.users.recent-act-desk')

  {{ $subscription?->stripe_status == 'active' ? 'Subscription Active' : 'Subscription Inactive' }}

{{ $subscription?->stripe_price == 'price_1TDnR5RBqlwskPfVY8CNlG6h' ? 'Subscribed to Plus' : 'Not Subscribed to Plus' }}

{{ $subscription?->stripe_price == 'price_1TDnRiRBqlwskPfV3gTwIQfS' ? 'Subscribed to Pro' : 'Not Subscribed to Pro' }}

</x-basix.ubase>