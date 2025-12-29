<x-app-layout>
    <div class="min-h-full">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
                    
            @include('users.mob-nav')
            @include('users.desk-nav')

            <div class="lg:pl-64 flex flex-col flex-1">
                <section class="bg-gray-50 p-3 sm:p-5">
                    <div class="mx-auto px-4 lg:px-12 lg:h-full">
                        <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="flex items-center justify-center border border-stone-500 hover:bg-cyan-700 hover:text-white text-stone-900 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2">
                                        Reasignar banner
                                    </button>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">IMAGEN ACTUAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $banner->image }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('comps.admin-updateban')
</x-app-layout>