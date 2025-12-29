<!-- Banner -->
<section class="relative w-full h-[80vh] flex items-center justify-center overflow-hidden">

  <!-- Imagen responsive (desktop / mobile) -->
  <picture>
    <!-- Imagen desktop -->
    <source media="(min-width:1024px)" srcset="{{ asset('assets/banners/banner 19-9.png') }}">
    <!-- Imagen mobile -->
    <img 
      src="{{ asset('assets/banners/angelpro.PNG') }}" 
      alt="Colecciones en promoción" 
      class="absolute inset-0 w-full h-full object-cover object-center"
    >
  </picture>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent backdrop-blur-[1px]"></div>

  <!-- Contenido -->
  <div class="relative z-10 text-center lg:text-left px-6 md:px-16 lg:px-32 max-w-5xl">
    <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight drop-shadow-xl">
      Las mejores colecciones <br class="hidden md:block"> 
      <span class="text-yellow-400">para ti</span>
    </h1>

    <p class="mt-4 text-lg md:text-xl text-gray-200/90 max-w-xl mx-auto lg:mx-0">
      Descubre nuestra seleccion de Monedas de Oro, Plata y Billetes. Aqui te ofrecemos una amplia variedad de monedas de oro y plata de alta calidad, cuidadosamente seleccionadas para satisfacer tus necesidades de inversion y coleccionismo.
    </p>

    <div class="mt-10">
      <a href="{{ route('store') }}" 
         class="inline-flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 text-lg font-semibold px-8 py-3 rounded-full shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-yellow-500/40">
        Comprar ahora
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </a>
    </div>
  </div>

</section>
<!-- ./Banner -->
