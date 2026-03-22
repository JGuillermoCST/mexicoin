<x-guest-layout>

<section class="bg-white py-12 px-6 md:px-16">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-indio-oscuro mb-6 text-center">Política de Devoluciones</h1>
        <p class="text-gray-700 mb-8 text-center">
            En <strong>MEXICOIN</strong> queremos que estés completamente satisfecho con tu compra.  
            A continuación te explicamos cómo manejamos las devoluciones y reclamaciones.
        </p>

        <div id="accordion-devoluciones" data-accordion="collapse" class="space-y-3">

            {{-- Acordeón 1 --}}
            <h2 id="accordion-devoluciones-heading-1">
                <button type="button" class="flex justify-between items-center w-full p-5 font-medium text-left text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-indio-verde" 
                    data-accordion-target="#accordion-devoluciones-body-1" aria-expanded="true" aria-controls="accordion-devoluciones-body-1">
                    <span>1. Productos elegibles para devolución</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-devoluciones-body-1" class="hidden" aria-labelledby="accordion-devoluciones-heading-1">
                <div class="p-5 border border-t-0 border-gray-200 rounded-b-lg">
                    <p class="text-gray-600">
                        Aceptamos devoluciones únicamente en los siguientes casos:
                    </p>
                    <ul class="list-disc list-inside mt-2 text-gray-600 space-y-1">
                        <li>El producto recibido no corresponde al solicitado.</li>
                        <li>El artículo presenta daños físicos o defectos de autenticidad comprobables.</li>
                        <li>La entrega fue incompleta o con errores de envío.</li>
                    </ul>
                </div>
            </div>

            {{-- Acordeón 2 --}}
            <h2 id="accordion-devoluciones-heading-2">
                <button type="button" class="flex justify-between items-center w-full p-5 font-medium text-left text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-indio-verde" 
                    data-accordion-target="#accordion-devoluciones-body-2" aria-expanded="false" aria-controls="accordion-devoluciones-body-2">
                    <span>2. Plazo para solicitar una devolución</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-devoluciones-body-2" class="hidden" aria-labelledby="accordion-devoluciones-heading-2">
                <div class="p-5 border border-t-0 border-gray-200 rounded-b-lg">
                    <p class="text-gray-600">
                        Las devoluciones deben solicitarse dentro de los <strong>7 días hábiles posteriores</strong> a la recepción del pedido.
                        Después de este periodo, no se aceptarán reclamos.
                    </p>
                </div>
            </div>

            {{-- Acordeón 3 --}}
            <h2 id="accordion-devoluciones-heading-3">
                <button type="button" class="flex justify-between items-center w-full p-5 font-medium text-left text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-indio-verde" 
                    data-accordion-target="#accordion-devoluciones-body-3" aria-expanded="false" aria-controls="accordion-devoluciones-body-3">
                    <span>3. Proceso para solicitar una devolución</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-devoluciones-body-3" class="hidden" aria-labelledby="accordion-devoluciones-heading-3">
                <div class="p-5 border border-t-0 border-gray-200 rounded-b-lg">
                    <ol class="list-decimal list-inside text-gray-600 space-y-1">
                        <li>Envíanos un correo a <a href="mailto:contacto@inversionesnumismaticas.com" class="text-indio-oscuro font-medium hover:underline">contacto@inversionesnumismaticas.com</a> con el número de pedido y una descripción del motivo de la devolución.</li>
                        <li>Adjunta fotografías del producto (frente, reverso y empaque).</li>
                        <li>Te responderemos con las instrucciones y dirección para el envío de regreso.</li>
                    </ol>
                </div>
            </div>

            {{-- Acordeón 4 --}}
            <h2 id="accordion-devoluciones-heading-4">
                <button type="button" class="flex justify-between items-center w-full p-5 font-medium text-left text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-indio-verde" 
                    data-accordion-target="#accordion-devoluciones-body-4" aria-expanded="false" aria-controls="accordion-devoluciones-body-4">
                    <span>4. Condiciones para aceptar devoluciones</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-devoluciones-body-4" class="hidden" aria-labelledby="accordion-devoluciones-heading-4">
                <div class="p-5 border border-t-0 border-gray-200 rounded-b-lg text-gray-600">
                    <p>Los artículos deben devolverse en las mismas condiciones en que fueron recibidos:</p>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Sin alteraciones ni manipulaciones.</li>
                        <li>Con su empaque original y certificados (si aplica).</li>
                        <li>El envío de retorno corre por cuenta del comprador, salvo error nuestro.</li>
                    </ul>
                </div>
            </div>

            {{-- Acordeón 5 --}}
            <h2 id="accordion-devoluciones-heading-5">
                <button type="button" class="flex justify-between items-center w-full p-5 font-medium text-left text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-indio-verde" 
                    data-accordion-target="#accordion-devoluciones-body-5" aria-expanded="false" aria-controls="accordion-devoluciones-body-5">
                    <span>5. Reembolsos</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-devoluciones-body-5" class="hidden" aria-labelledby="accordion-devoluciones-heading-5">
                <div class="p-5 border border-t-0 border-gray-200 rounded-b-lg text-gray-600">
                    <p>
                        Una vez recibido el producto y validado su estado, el reembolso se procesará en un plazo máximo de <strong>5 días hábiles</strong>.
                        El reembolso se realizará mediante el mismo método de pago utilizado en la compra.
                    </p>
                </div>
            </div>

        </div>

        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="inline-block bg-indio-verde text-white px-6 py-3 rounded-lg hover:bg-indio-gris transition-colors">
                Volver al inicio
            </a>
        </div>
    </div>
</section>

</x-guest-layout>