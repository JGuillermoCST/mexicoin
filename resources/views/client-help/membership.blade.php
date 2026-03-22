<x-guest-layout>
<section class="bg-white py-16 px-6 md:px-16">
    <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-indio-oscuro mb-4">Membresía <span class="text-indio-verde">Pro</span></h1>
        <p class="text-gray-600 mb-10 max-w-2xl mx-auto">
            Conviértete en miembro <strong>Pro</strong> y obtén beneficios exclusivos para tus compras de monedas, billetes y colecciones.  
            Ahorra tiempo y dinero con envíos gratuitos, acceso anticipado a nuevos productos y precios preferenciales.
        </p>

        {{-- Tarjeta de Membresía Pro --}}
        <div class="grid place-items-center">
            <div class="bg-indio-oscuro text-white rounded-2xl shadow-xl w-full md:w-2/3 lg:w-1/2 transition transform hover:scale-105 hover:shadow-2xl">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-4 text-indio-verde">Plan Pro</h2>
                    <p class="text-gray-200 mb-6">
                        Ideal para coleccionistas frecuentes y compradores que buscan ventajas exclusivas.
                    </p>

                    <div class="border-t border-gray-600 my-4"></div>

                    <ul class="text-left space-y-3 mb-6">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indio-verde mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Envíos gratuitos en todas tus compras
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indio-verde mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Acceso anticipado a nuevos lanzamientos
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indio-verde mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Descuentos exclusivos en productos seleccionados
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indio-verde mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Soporte prioritario y atención personalizada
                        </li>
                    </ul>

                    <div class="text-center mb-6">
                        <span class="text-5xl font-extrabold text-indio-verde">$499</span>
                        <span class="text-gray-400 text-lg">/mes</span>
                    </div>

                    <a href="#" class="inline-block bg-indio-verde text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-indio-gris transition">
                        ¡Hazte miembro Pro!
                    </a>
                </div>
            </div>
        </div>

        {{-- Sección informativa adicional --}}
        <div class="mt-16 grid md:grid-cols-3 gap-6 text-left">
            <div class="border rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <h3 class="text-indio-oscuro font-semibold text-lg mb-2">Ahorra en envíos</h3>
                <p class="text-gray-600 text-sm">Disfruta de <strong>envíos gratuitos</strong> en todas tus compras, sin mínimo de monto ni restricciones de zona.</p>
            </div>
            <div class="border rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <h3 class="text-indio-oscuro font-semibold text-lg mb-2">Más valor por tu dinero</h3>
                <p class="text-gray-600 text-sm">Obtén <strong>precios preferenciales</strong> y promociones exclusivas en artículos de colección seleccionados.</p>
            </div>
            <div class="border rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <h3 class="text-indio-oscuro font-semibold text-lg mb-2">Colecciona primero</h3>
                <p class="text-gray-600 text-sm">Sé de los primeros en acceder a <strong>nuevas piezas</strong> antes de su lanzamiento público.</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ url('/') }}" class="inline-block text-indio-oscuro underline hover:text-indio-gris">Volver al inicio</a>
        </div>
    </div>
</section>

</x-guest-layout>