<x-guest-layout>
  <div class="h-screen flex justify-center items-center bg-linear-to-tr from-emerald-100 via-emerald-300 to-gray-100 px-4">

    <div class="max-w-lg w-full bg-white/30 backdrop-blur-xl shadow-2xl rounded-2xl border border-white/40 p-10 text-center animate-fadeIn">
      
      <h2 class="text-5xl font-extrabold text-gray-800 tracking-tight drop-shadow-sm">
        🚀 Llega pronto
      </h2>
      
      <p class="mt-4 text-lg text-gray-700 leading-relaxed">
        Estamos trabajando para traerte algo increíble.<br>
        ¡Vuelve pronto y descubre lo nuevo!
      </p>

      <div class="mt-8">
        <a href="/" class="inline-flex items-center px-6 py-2.5 text-sm font-semibold text-white bg-emerald-500 rounded-full shadow hover:bg-emerald-600 transition">
          Volver al inicio
        </a>
      </div>

    </div>

  </div>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease-out;
    }
  </style>
</x-guest-layout>
