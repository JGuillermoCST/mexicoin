<x-app-layout>
  <div class="min-h-full">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
                    
      @include('users.mob-nav')
      @include('users.desk-nav')

      <div class="lg:pl-64 flex flex-col flex-1">
        {{-- {{ var_dump($prices) }} --}}

        @include('admin.prod-tb')

        
      </div>
    </div>
  </div>

  @include('admin.prod-add')
</x-app-layout>