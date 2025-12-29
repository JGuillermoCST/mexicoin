<!-- Promo Section -->
<div class="container pb-20 px-4">
  <div class="text-center mb-10">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 uppercase tracking-tight">
      En promoción
    </h2>
    <div class="mt-2 h-1 w-24 bg-gradient-to-r from-sky-400 to-blue-500 mx-auto rounded-full"></div>
  </div>

  <a href="#" class="block w-11/12 md:w-9/12 mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-200/60 transition-shadow duration-300">
    <img 
      src="{{ asset('assets/banners/promos/'. $banner->image) }}" 
      alt="Oferta en promoción"
      class="w-full object-cover rounded-2xl select-none pointer-events-none"
    >
  </a>
</div>
<!-- ./Promo Section -->
