<x-guest-layout>
<section class="bg-gradient-to-b from-white via-[#FFFDF6] to-white py-20 px-6">
  <div class="max-w-3xl mx-auto">
    
    <!-- Title -->
    <div class="text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-extrabold text-[#1C3144] tracking-tight">
        Preguntas <span class="text-yellow-500">Frecuentes</span>
      </h2>
      <div class="mt-3 h-1 w-24 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full shadow-lg"></div>
    </div>

    <!-- Accordion -->
    <div id="accordion-faq" class="space-y-5">
      @foreach([
        ['q' => '¿Cómo sé que mis monedas o billetes son auténticos?', 'a' => 'Todos nuestros productos son verificados y certificados antes de ponerse a la venta. Nos especializamos en artículos genuinos y garantizados.'],
        ['q' => '¿Qué métodos de pago aceptan?', 'a' => 'Aceptamos transferencias bancarias y próximamente pagos con MercadoPago, Clip y PayPal.'],
        ['q' => '¿Hacen envíos a toda la República Mexicana?', 'a' => 'Sí, realizamos envíos a todo México mediante DHL, Estafeta, UPS y FedEx, con número de rastreo.'],
        ['q' => '¿Puedo devolver un producto si no estoy satisfecho?', 'a' => 'Sí, puedes devolverlo en los primeros 7 días si está en las mismas condiciones. Contáctanos para iniciar el proceso.'],
        ['q' => '¿Tienen tienda física?', 'a' => 'Por el momento solo operamos en línea, pero planeamos abrir una tienda física en el futuro.']
      ] as $i => $faq)
      <div class="group bg-white border border-yellow-400/40 rounded-2xl shadow-sm hover:shadow-yellow-200/60 hover:border-yellow-400 transition-all duration-300 overflow-hidden relative">
        <button 
          type="button" 
          class="w-full flex justify-between items-center px-6 py-5 text-left text-[#1C3144] font-semibold focus:outline-none transition-all duration-300"
          onclick="toggleFaq({{ $i }})"
        >
          <span class="group-hover:text-yellow-600 transition">{{ $faq['q'] }}</span>
          <svg id="icon-{{ $i }}" class="w-6 h-6 text-yellow-500 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <div id="faq-{{ $i }}" class="hidden px-6 pb-5 text-gray-700 leading-relaxed text-[15px] opacity-0 transition-all duration-500 transform translate-y-2">
          {{ $faq['a'] }}
        </div>

        <!-- Glow line -->
        <div class="absolute bottom-0 left-0 w-0 h-[2px] bg-gradient-to-r from-yellow-400 to-yellow-600 transition-all duration-500 group-hover:w-full"></div>
      </div>
      @endforeach
    </div>
  </div>

  <script>
    function toggleFaq(id) {
      const content = document.getElementById(`faq-${id}`);
      const icon = document.getElementById(`icon-${id}`);
      const isOpen = !content.classList.contains('hidden');

      // Cerrar todos
      document.querySelectorAll('[id^="faq-"]').forEach(el => {
        el.classList.add('hidden');
        el.classList.remove('opacity-100', 'translate-y-0');
        el.classList.add('opacity-0', 'translate-y-2');
      });
      document.querySelectorAll('[id^="icon-"]').forEach(el => el.classList.remove('rotate-180'));

      // Abrir el seleccionado
      if (!isOpen) {
        content.classList.remove('hidden', 'opacity-0', 'translate-y-2');
        content.classList.add('opacity-100', 'translate-y-0');
        icon.classList.add('rotate-180');
      }
    }
  </script>
</section>
</x-guest-layout>
