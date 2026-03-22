<x-guest-layout>
    @push('styles')
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" /> --}}
        <style>
            .swiper-wrapper {
                height: max-content !important;
                
                width: max-content;
            }

            .swiper-button-prev:after,
            .swiper-rtl .swiper-button-next:after {
                content: "" !important;
            }

            .swiper-button-next:after,
            .swiper-rtl .swiper-button-prev:after {
                content: "" !important;

            }

            .product-thumb .swiper-slide.swiper-slide-thumb-active>.slide\:border-indigo-600 {
                --tw-border-opacity: 1;
                border-color: rgb(79 70 229 / var(--tw-border-opacity));
            }
        </style>
        
    @endpush

    @include('comps.store.productinfo')

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".product-thumb", {
                loop: true,
                spaceBetween: 12,
                slidesPerView: 4,
                
                freeMode: true,
                watchSlidesProgress: true,
                
            });
            var swiper2 = new Swiper(".product-prev", {
                loop: true,
                spaceBetween: 32,
                effect: "fade",
                
                thumbs: {
                    swiper: swiper,
                },
                
            });
        </script>
    @endpush
</x-guest-layout>