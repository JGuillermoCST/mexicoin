<x-app-layout>
  <div class="min-h-screen">
    @include('comps.users.nav')
  
    <div class="lg:pl-64 flex flex-col flex-1">
      @yield('uheader')
  
      <main class="flex-1 pb-8">
        <div class="lg:min-h-full">
          {{ $slot }}
        </div>
      </main>
    </div>
  </div>
</x-app-layout>